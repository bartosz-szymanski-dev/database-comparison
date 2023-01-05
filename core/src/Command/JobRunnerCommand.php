<?php

namespace App\Command;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;

#[AsCommand(
    name: 'app:run-jobs',
    description: 'Command to check for new jobs and run them',
)]
class JobRunnerCommand extends Command
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly EntityManagerInterface $entityManager,
        private readonly KernelInterface $kernel,
    ) {
        parent::__construct('app:run-jobs');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repository = $this->entityManager->getRepository(Job::class);
        $jobsToRun = $repository->findLatestNotRunJobs();

        if ($jobsToRun) {
            $context = ['moment' => (new \DateTime())->format('Y-m-d H:i:s')];
            $this->logger->warning('There is nothing to be run at this moment', $context);
        } else {
            $this->runJobs($jobsToRun);
        }

        return Command::SUCCESS;
    }

    private function runJob(Job $job): void
    {
        $jobId = $job->getId();
        $context = ['job_id' => $jobId];
        try {
            $application = new Application($this->kernel);
            $application->setAutoExit(false);
            $params = array_merge(
                ['command' => $job->getCommand()],
                $job->getParameters(),
            );
            $application->run(new ArrayInput($params));
            $job->setIsFinished(true);
            $this->entityManager->persist($job);
            $this->logger->debug('Job has been successfully processed', $context);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage(), $context);
        }
    }

    private function runJobs(array $jobsToRun): void
    {
        /** @var Job $job */
        foreach ($jobsToRun as $job) {
            $this->runJob($job);
        }
        $this->entityManager->flush();
    }
}
