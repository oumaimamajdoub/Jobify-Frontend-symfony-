<?php

namespace App\Controller\Admin;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 * Class AdminController
 * @package App\Controller\Admin
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/home", name="admin")
     */
    public function admin(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        $data=array();
        $psts=array();
        foreach ($posts as $post)
        {
         array_push($data,sizeof($post->getApplications()));
         array_push($psts,$post->getTitre());


        }

        return $this->render("admin/home.html.twig",array("data"=>$data,"posts"=>$psts));

    }
}