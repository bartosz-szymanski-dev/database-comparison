<?php

namespace App\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateAllController extends AbstractController
{
    #[Route(
        '/mongo-db/update-all',
        name: 'front.mongo_db.update_all',
        methods: ['PUT', 'PATCH', 'POST'],
    )]
    public function __invoke(): Response
    {
        return new Response('Update-all');
    }
}
