<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use App\Entity\ProductColors;
use App\Form\ProductCartType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/Creation', name: 'Creations')]
    public function index(): Response
    {
        $product = $this->entityManager->getRepository(Product::class)->findBy([],['id'=>'ASC']);

        return $this->render('product/index.html.twig', [
            'Products' => $product,
        ]);
    }

    #[Route('/Creation/{slug}', name: 'Creation')]
    public function Creation($slug,Request $request,Cart $cart): Response
    {
        $creation= $this->entityManager->getRepository(Product::class)->findOneBy(['Slug'=>$slug]);
        if (!$creation) {
            return $this->redirectToRoute("Creation");
        }
        $form=$this->createForm(ProductCartType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data =$form->getData();
            $colorCheck = $this->entityManager->getRepository(ProductColors::class)->findOneBy(['id'=>$data["Color"]]);
            if ($colorCheck != null) {
                if (in_array($colorCheck,$creation->getProductColors()->getValues())){
                    if ($data["Quantity"]>0){
                        $cart->Add($creation,$data['Quantity'],$colorCheck);
//                        $cart->RemoveCart();
                    }
                }
            }

        }


        return $this->render('product/product.html.twig', [
            "Creation" => $creation,
            "Forms" => $form ->createView()
        ]);
    }
}
