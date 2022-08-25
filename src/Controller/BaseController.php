<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
    #[Route('/a-propos-de-nous', name: 'aboutus')]
    public function produits(): Response
    {
        return $this->render('pages/aboutus.html.twig', [
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

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/contact', name: 'contact')]
    public function contact(MailerInterface $mailer): Response
    {
        if(isset($_POST['submit'])){
            $email = (new TemplatedEmail())
                ->from('nv0ecs@gmail.com')
                ->to('nv0ecs@gmail.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Un message est arrivé !')
                ->htmlTemplate('mail/message.html.twig')
                ->context([
                    'name' => $_POST['name'],
                    'firstname' => $_POST['firstname'],
                    'mail' => $_POST['email'],
                    'message' => $_POST['message'],
                ]);

            $mailer->send($email);

            $envoie = "oui";
            return $this->render('pages/contact.html.twig', [
                'envoie' => $envoie,
            ]);
        }
        return $this->render('pages/contact.html.twig', [
        ]);
    }
//    #[Route('/profile', name: 'profile')]
//    public function profile(): Response
//    {
//        return $this->render('user/profile.html.twig', [
//            'controller_name' => 'BaseController',
//        ]);
//    }
    #[Route('/réservation', name: 'reservation')]
    public function reservation(): Response
    {
        return $this->render('user/reservation.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
//    #[Route('/notifications', name: 'notifications')]
//    public function notifications(): Response
//    {
//        return $this->render('user/notifications.html.twig', [
//            'controller_name' => 'BaseController',
//        ]);
//    }
//    #[Route('/messages', name: 'messages')]
//    public function messages(): Response
//    {
//        return $this->render('user/messages.html.twig', [
//            'controller_name' => 'BaseController',
//        ]);
//    }
//    #[Route('/paramètres', name: 'parametres')]
//    public function parametres(): Response
//    {
//        return $this->render('user/parametres.html.twig', [
//            'controller_name' => 'BaseController',
//        ]);
//    }
}
