<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EvenementType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    #[Route('/listEvent', name: 'list_event')]
    public function listEvenement(EvenementRepository $repository)
    {
        $event= $repository->findAll();
        return $this->render("evenement/list.html.twig",array("listEvent"=>$event));
    }
        #[Route('/addevenement', name: 'app_addevenement')]
    public function addevenement(Request $request, ManagerRegistry $doctrine)
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            //  $em= $this->getDoctrine()->getManager();
            $em = $doctrine->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute("list_event");
        }
        // return $this->render('product/add.html.twig',array("formProduct"=>$form->createView()));
        return $this->renderForm('evenement/add.html.twig', array("formEvenement" => $form));
    }
    #[Route('/updateForm/{id}', name: 'updateForm_evenement')]
    public function updateForm($id,EvenementRepository $repository,Request $request,ManagerRegistry $doctrine)
    {
        $evenement= $repository->find($id);
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request) ;
        if($form->isSubmitted()){
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("list_event");
        }
        return $this->renderForm("evenement/update.html.twig",array("formEvenement"=>$form));
    }
    #[Route('/removeForm/{id}', name: 'removeForm_categorie')]
    public function removeEvenement(ManagerRegistry $doctrine,$id,EvenementRepository $repository): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $evenement= $repository->find($id);
        $em= $doctrine->getManager();
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute("list_event");
    }









}
