<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectcType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectCrudController extends AbstractController
{
    /**
     * @Route("admin/project", name="project_crud", methods={"GET"})
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    /*public function index(ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->findAll();
        return $this->render('project_crud/index.html.twig', [
            'project' => $project,
        ]);
    }*/

    /**
     * @Route("admin/{id}/edit", name="project_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function editProject(Request $request, Project $project): Response
    {

        $form = $this->createForm(ProjectcType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_data');
        }

        return $this->render('project_crud/edit.html.twig', [
           'project' => $project,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}", name="project_delete", methods={"DELETE"})
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function deleteProject(Request $request, Project $project): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_data');
    }
}

