<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerruqueController extends AbstractController
{
    #[Route('/perruque', name: 'app_perruque')]
    public function index(): Response
    {
        return $this->render('perruque/index.html.twig', [
            'controller_name' => 'PerruqueController',
        ]);
    }
}
