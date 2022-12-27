<?php

namespace App\Controller\MySQL;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractController
{
    #[Route(
        path: '/mysql/get-all',
        name: 'front.mysql.get_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(): Response
    {
        return new Response('Get-all');
    }
}
