<?php

namespace App\Controller\MongoDB;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractController
{
    #[Route(
        '/mongo-db/get-all',
        name: 'front.mongo_db.get_all',
        methods: ['GET', 'HEAD'],
    )]
    public function __invoke(): Response
    {
        return new Response();
    }
}
