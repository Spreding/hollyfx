<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\DeliverySystem;
use App\Entity\PostalAdress;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/order', name: 'app_order')]
    public function index(Cart $cart): Response
    {


        if ($cart->GetCart()!= null && count($cart->GetCart())== 0){
            return $this->redirectToRoute('app_cart');
        }
        //GET ALL DELIVERY
        $delivery = $this->entityManager->getRepository(DeliverySystem::class)->findBy([],['id'=>'ASC']);
        //GET ADDRESS DU USER
        $adress = $this->getUser()->getPostalAdresses();

        return $this->render('order/index.html.twig', [
            'delivery' => $delivery,
            'address' => $adress,
        ]);
    }
    #[Route('/order/confirmation', name: 'app_order_confirmation')]
    public function confirmationOrder(Cart $cart,Request $request): Response
    {

        if (!$request->isMethod('POST') && $request->request->get('delivery') === null && $request->request->get('addressPostal') === null ) {
            return $this->redirectToRoute('app_order');
        }
        if ($cart->GetCart()!= null && count($cart->GetCart())== 0){
            return $this->redirectToRoute('app_order');
        }
        $deliveryRefId = (int)htmlspecialchars( $request->request->get('delivery'),ENT_QUOTES,"UTF-8");
        $addressRefId = (int)htmlspecialchars($request->request->get('addressPostal'),ENT_QUOTES,"UTF-8");

        //GET DELIVERY CHOISI
        $delivery = $this->entityManager->getRepository(DeliverySystem::class)->findOneBy(['id'=>$deliveryRefId]);

        //GET ADDRESS CHOISI DU USER
        $address = $this->entityManager->getRepository(PostalAdress::class)->findOneBy(['id'=>$addressRefId]);


        if (!$delivery || !$address){
            return $this->redirectToRoute('app_cart');
        }

        return $this->render('order/confirmation.html.twig', [
            'delivery' => $delivery,
            'address' => $address,
        ]);
    }


}
