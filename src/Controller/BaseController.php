<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
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
    public function articles(ArticleRepository $articleRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('pages/actualites.html.twig', [
            'articles' => $articleRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/réservation', name: 'reservation')]
    public function reservation(): Response
    {
        return $this->render('user/reservation.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/notifications', name: 'notifications')]
    public function notifications(): Response
    {
        return $this->render('user/notifications.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/messages', name: 'messages')]
    public function messages(): Response
    {
        return $this->render('user/messages.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
    #[Route('/paramètres', name: 'parametres')]
    public function parametres(): Response
    {
        return $this->render('user/parametres.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
