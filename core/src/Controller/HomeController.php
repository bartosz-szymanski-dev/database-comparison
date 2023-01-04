<?php

namespace App\Controller;

use App\Form\ActionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'front.home', methods: ['GET', 'HEAD'])]
    public function __invoke(): Response
    {
        $parameters = ['form' => $this->createForm(ActionType::class)];

        return $this->renderForm('home/index.html.twig', $parameters);
    }
}
