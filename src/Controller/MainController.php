<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/projets', name: 'app_projets')]
    public function projets(): Response
    {
        return $this->render('main/projets.html.twig');
    }
    #[Route('/veille', name: 'app_veille')]
    public function veille(): Response
    {
        return $this->render('main/veille.html.twig');
    }
    
}
