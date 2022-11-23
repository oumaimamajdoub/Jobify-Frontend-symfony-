<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;

use App\Repository\ParticipantRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class ParticipantController extends AbstractController
{
    #[Route('/participant', name: 'app_participant')]
    public function index(): Response
    {
        return $this->render('participant/index.html.twig', [
            'controller_name' => 'ParticipantController',
        ]);
    }
    #[Route('/listparticipant', name: 'list_participant')]
    public function listParticipant(ParticipantRepository $repository)
    {
        $participant= $repository->findAll();
        return $this->render("participant/list.html.twig",array("listparticipant"=>$participant));
    }
    #[Route('/addparticipant', name: 'app_addparticipant')]
    public function addparticipant(Request $request, ManagerRegistry $doctrine)
    {
        $participant = new Participant();
        $form = $this->createForm(ParticipantType::class, $participant);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            //  $em= $this->getDoctrine()->getManager();
            $em = $doctrine->getManager();
            $em->persist($participant);
            $em->flush();
            return $this->redirectToRoute("list_participant");
        }
        // return $this->render('product/add.html.twig',array("formProduct"=>$form->createView()));
        return $this->renderForm('participant/add.html.twig', array("formParticipant" => $form));
    }
    #[Route('/updateFormpart/{id}', name: 'updateForm_participant')]
    public function updateForm($id,ParticipantRepository $repository,Request $request,ManagerRegistry $doctrine)
    {
        $participant= $repository->find($id);
        $form = $this->createForm(ParticipantType::class, $participant);
        $form->handleRequest($request) ;
        if($form->isSubmitted()){
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("list_participant");
        }
        return $this->renderForm("participant/update.html.twig",array("formParticipantt"=>$form));
    }
    #[Route('/removeForm/{id}', name: 'removeForm_participant')]
    public function removeParticipant(ManagerRegistry $doctrine,$id,ParticipantRepository $repository): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $participant= $repository->find($id);
        $em= $doctrine->getManager();
        $em->remove($participant);
        $em->flush();
        return $this->redirectToRoute("list_participant");
    }


}
