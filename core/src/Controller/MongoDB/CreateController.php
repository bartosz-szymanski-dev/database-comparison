<?php

namespace App\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    #[Route(
        '/mongo-db/create',
        name: 'front.mongo_db.create',
        methods: ['POST'],
    )]
    public function __invoke(): Response
    {
        return new Response();
    }
}
