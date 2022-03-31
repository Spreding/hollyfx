<?php

namespace App\Controller;

use App\Classe\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    #[Route('/cart/setcart/{productkey}/{quantity}', name: 'app_setcart')]
    public function setcart($productkey,$quantity,Cart $cart): Response
    {
        if (!array_key_exists($productkey,$cart->GetCart())){
            return $this->redirectToRoute("app_cart");
        }
//        $product = $cart->GetCart()[$productkey];
       $cart->SetCart($productkey,$quantity);
        return $this->redirectToRoute("app_cart");
    }


}
