<?php

namespace App\Controller;

use App\Service\Home\TabPaneClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'front.home')]
    public function index(TabPaneClient $tabPaneClient): Response
    {
        $parameters = ['tabPanes' => $tabPaneClient->create()];

        return $this->render('home/index.html.twig', $parameters);
    }
}
