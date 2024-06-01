<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/admin/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig', [
            'user' => $this->container->get('security.token_storage')->getToken()->getUser()
        ]);
    }
}
