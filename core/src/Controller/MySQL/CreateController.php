<?php

namespace App\Controller\MySQL;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    #[Route(
        path: '/mysql/create',
        name: 'front.mysql.create',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(): Response
    {
        return new Response('Create');
    }
}
