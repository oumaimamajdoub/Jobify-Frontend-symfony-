<?php

namespace App\Controller;

use App\Repository\ApplicationRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PieChartController extends AbstractController
{
    #[Route('/pie/chart', name: 'app_pie_chart')]
    public function index(): Response
    {
        return $this->render('pieChart/index.html.twig', [
            'controller_name' => 'PieChartController',
        ]);
    }

    #[Route('/piechart', name: 'app_application_piechart', methods: ['GET'])]
    public function getPieChart( ApplicationRepository $applicationRepository,PostRepository $postRepository): Response
    {
        return $this->render('Back_office/application/piechart.html.twig', ["application"=>$applicationRepository->findAll()

            ,"countPosts"=>$postRepository->postsbyApplication($applicationRepository),"allpostscount"=>$postRepository->countposts()]);
    }
}