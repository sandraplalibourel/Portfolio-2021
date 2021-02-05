<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectCrudController extends AbstractController
{
    /**
     * @Route("admin/project/crud", name="project_crud", methods={"GET"})
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->findAll();
        return $this->render('project_crud/index.html.twig', [
            'project' => $project,
        ]);
    }
}

