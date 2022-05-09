<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    #[Route('/coiffures', name: 'coiffures')]
    public function coiffures(): Response
    {
        return $this->render('pages/coiffures.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/produits', name: 'produits')]
    public function produits(): Response
    {
        return $this->render('pages/produits.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/actualites', name: 'actualites')]
    public function actualites(): Response
    {
        return $this->render('pages/actualites.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
