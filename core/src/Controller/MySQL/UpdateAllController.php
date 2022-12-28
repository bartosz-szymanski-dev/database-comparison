<?php

namespace App\Controller\MySQL;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateAllController extends AbstractController
{
    #[Route(
        path: '/mysql/update-all',
        name: 'front.mysql.update_all',
        methods: ['PUT', 'PATCH'],
    )]
    public function __invoke(): Response
    {
        return new Response('Update-all');
    }
}
