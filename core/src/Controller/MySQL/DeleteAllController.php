<?php

namespace App\Controller\MySQL;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAllController extends AbstractController
{
    #[Route(
        path: '/mysql/delete-all',
        name: 'front.mysql.delete_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(): Response
    {
        return new Response('Delete-all');
    }
}
