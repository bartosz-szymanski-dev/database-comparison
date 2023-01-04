<?php

namespace App\Controller;

use App\Form\ActionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends AbstractController
{
    #[Route(
        path: '/action',
        name: 'front.action',
        methods: ['POST'],
    )]
    public function index(Request $request): Response
    {
        $form = $this
            ->createForm(ActionType::class)
            ->handleRequest($request);
        if (!$form->isValid() || !$form->isValid()) {
            throw new BadRequestException();
        }

        return $this->redirectToRoute(
            sprintf('front.%s.%s', $form->get('db_type')->getData(), $form->get('action')->getData()),
        );
    }
}
