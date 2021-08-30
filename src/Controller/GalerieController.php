<?php

namespace App\Controller;

use App\Entity\CategorieImage;
use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalerieController extends AbstractController
{
    /**
     * @Route("/Portfolio", name="Portfolio")
     */
    public function index(): Response
    {
        return $this->render('galerie/index.html.twig', [
            'controller_name' => 'GalerieController',
        ]);
    }

    /**
     * @Route("/Portfolio/Creation", name="Creation")
     */
    public function Creation(): Response
    {
        $Categorie = $this->getDoctrine()->getRepository(CategorieImage::class)->findOneBy(['Name' => 'Creation']);
        $images = [];

        foreach ($Categorie->getImages() as $key => $value) {
            $images[] = $value;
        }
        return $this->render('galerie/creation.html.twig', [
            'controller_name' => 'GalerieController',
            'images' => $images
        ]);
    }

    /**
     * @Route("/Portfolio/MakeUp", name="MakeUp")
     */
    public function MakeUp(): Response
    {
        $Categorie = $this->getDoctrine()->getRepository(CategorieImage::class)->findOneBy(['Name' => 'MakeUp']);
        $images = [];

        foreach ($Categorie->getImages() as $key => $value) {
            $images[] = $value;
        }
        return $this->render('galerie/makeup.html.twig', [
            'controller_name' => 'GalerieController',
            'images' => $images
        ]);
    }
    /**
     * @Route("/Portfolio/Perruque", name="Perruque")
     */
    public function Perruque(): Response
    {
        $Categorie = $this->getDoctrine()->getRepository(CategorieImage::class)->findOneBy(['Name' => 'Perruque']);
        $images = [];

        foreach ($Categorie->getImages() as $key => $value) {
            $images[] = $value;
        }
        return $this->render('galerie/perruque.html.twig', [
            'controller_name' => 'GalerieController',
            'images' => $images
        ]);
    }
}
