<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project")
     * @param ProjectRepository $projectRepository
     * @param TechnologyRepository $technologyRepository
     * @return Response
     */
    public function index(ProjectRepository $projectRepository, TechnologyRepository $technologyRepository): Response
    {
        $technology = $technologyRepository->findAll();
        $project = $projectRepository->findAll();
        return $this->render('project/index.html.twig', [
            'project' => $project,
            'technologies' => $technology,
        ]);
    }
}
