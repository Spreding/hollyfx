<?php

namespace App\Controller;

use App\Entity\CategorieImage;
use App\Entity\Image;
use App\Entity\MaquillageProduct;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalerieController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/Maquillage", name="Maquillage")
     */
    public function index(): Response
    {
        return $this->render('galerie/index.html.twig', [
            'controller_name' => 'GalerieController',
        ]);
    }

    /**
     * @Route("/Maquillage/{slug}", name="Categorie")
     */
    public function Maquillage($slug): Response
    {
        $Categorie = $this->entityManager->getRepository(MaquillageProduct::class)->findOneBy(['slug' => $slug]);
        if (!$Categorie) {
            return $this->redirectToRoute("Maquillage");
//            throw $this->createNotFoundException('Error 404');
        }
        return $this->render('galerie/categorie.html.twig', [
            "Categorie" => $Categorie
        ]);
    }
}
