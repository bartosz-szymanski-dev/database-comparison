<?php

namespace App\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAllController extends AbstractController
{
    #[Route(
        path: '/mongo-db/delete-all',
        name: 'front.mongo_db.delete_all',
        methods: ['DELETE']
    )]
    public function __invoke(): Response
    {
        return new Response('Delete-all');
    }
}
