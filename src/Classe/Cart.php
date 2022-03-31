<?php

namespace App\Classe;

use App\Entity\Product;
use App\Entity\ProductColors;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{

    private $cart;
    private $session;

    /**
     * @param $cart
     * @param $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->cart = $this->session->get("cart", []);
    }

    public function Add(Product $product, $quantity, $color)
    {
        $check = $this->CheckProductInCart($product, $color);
        if ($check >= 0) {
            $this->cart[$check]['quantity'] += $quantity;
        } else {
            $this->cart[] = [
                "id" => $product->getId(),
                "product" => $product,
                "quantity" => $quantity,
                "color" => $color,

            ];
        }
        $this->session->set('cart', $this->cart);
    }

    public function SetCart($productkey,$quantity){

        if ($quantity > 0){
            $this->cart[$productkey]['quantity'] = $quantity;
        }else{
            unset($this->cart[$productkey]);
        }

        $this->session->set('cart', $this->cart);
    }


    public function RemoveCart()
    {
        $this->cart = [];
        $this->session->set('cart', $this->cart);
    }

    public function CheckProductInCart($element, $color)
    {
        foreach ($this->cart as $key => $item) {
            if ($item['product']->getId() == $element->getId() && $item['color']->getId() == $color->getId()) {
                return $key;
            }
        }
        return -1;
    }

    public function GetCart()
    {
        return $this->cart;
    }

}