<?php

namespace App\Controller;

use App\Classe\Cart;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PaiementController extends AbstractController
{
    #[Route('/paiement', name: 'app_paiement')]
    public function index(Cart $cart, Request $request): Response
    {
        Stripe::setApiKey('sk_test_51HcSYAHXcHwl9YC7w9oHzwoggkGbIQ2HD5u6vmzCRNeBshBZy1XwpalSfmsSGGsQ7d5aTo6gCJavQ4UZXApkUbSd00ESIBH297');

        header('Content-Type: application/json');

        $YOUR_DOMAIN = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        $productForStripe = [];

        foreach ($cart->GetCart() as $item) {
            $productForStripe[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $item['product']->getPrice() * 100,
                    'product_data' => [
                        'name' => $item['product']->getTitle(),
                    ]
                ],
                'quantity' => $item['quantity'],

            ];
        }
//        $productForStripe[] = [
//            'price_data' => [
//                'currency' => 'eur',
//                'unit_amount' => $item['product']->getPrice() * 100,
//                'product_data' => [
//                    'name' => $item['product']->getName(),
//                ]
//            ],
//            'quantity' => $item['quantity'],
//
//        ];


        $checkout_session = \Stripe\Checkout\Session::create([

            'customer_email' => $this->getUser()->getEmail(),
            'line_items' => [$productForStripe],
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'success_url' => $YOUR_DOMAIN . '/paiement/sucess/{CHECKOUT_SESSION_ID}',
            'cancel_url' => $YOUR_DOMAIN . '/paiement/failed/{CHECKOUT_SESSION_ID}',
        ]);

        return $this->redirect($checkout_session->url);
    }

    #[Route('/paiement/sucess/{CHECKOUT_SESSION_ID}', name: 'app_paiement_success')]
    public function paiementSucess($CHECKOUT_SESSION_ID): Response
    {

        return $this->render('paiement/sucess.html.twig', [
            'controller_name' => 'PaiementController',
        ]);
    }

    #[Route('/paiement/failed/{CHECKOUT_SESSION_ID}', name: 'app_paiement_failed')]
    public function paiementFailed($CHECKOUT_SESSION_ID): Response
    {

        return $this->render('paiement/failed.html.twig', [
            'controller_name' => 'PaiementController',
        ]);
    }

}
