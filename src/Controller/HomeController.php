<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
        ]);}


        #[Route('/dashboard', name: 'dashboard')]
        public function inde(UserRepository $UserRepository): Response
        {
            return $this->render('User/dashboard.html.twig', [
                'Users' => $UserRepository->findAll(),
            ]);
        }
}
