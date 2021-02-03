<?php

namespace App\Controller;

use App\Repository\ContactFormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDataController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_data")
     * @param ContactFormRepository $contactFormRepository
     * @return Response
     */
    public function index(ContactFormRepository $contactFormRepository): Response
    {
        $messages = $contactFormRepository->findAll();
        return $this->render('admin_data/index.html.twig', [
            'messages' => $messages,
        ]);
    }
}
