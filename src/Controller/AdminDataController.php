<?php

namespace App\Controller;

use App\DataFixtures\TechnologiesFixtures;
use App\Entity\Project;
use App\Entity\Technology;
use App\Form\ProjectcType;
use App\Repository\ContactFormRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;

class AdminDataController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_data")
     * @param ContactFormRepository $contactFormRepository
     * @param Request $request
     * @return Response
     */
    public function index(ContactFormRepository $contactFormRepository, ProjectRepository $projectRepository, Request $request): Response
    {
        $project = new Project();

        $form = $this->createForm(ProjectcType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($project);
            $entityManager->flush();

            $this->addFlash('success', 'Projet ajouté !');

            return $this->redirectToRoute('admin_data');
        }

        $messages = $contactFormRepository->findAll();
        $projects = $projectRepository->findAll();

        return $this->render('admin_data/index.html.twig', [
            'messages' => $messages,
            'project_form' => $form->createView(),
            'projects' => $projects,
        ]);
    }
}
