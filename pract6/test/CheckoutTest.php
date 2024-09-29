<?php

use Alexander\Pract6\Checkout;
use Alexander\Pract6\Product;
use Alexander\Pract6\Cart;
use \PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function testCheckOut()
    {
        $product = new Product("mouse", 400.12, 1);
        $cart = new Cart();
        $checkout = new Checkout($cart);

        $cart->addItem($product, 1);
        $checkout->setPaymentMethod("credit card");
        $checkout->finalizeOrder();

        $this->assertTrue(true);
    }

    public function testPaymentMethodNotEmpty()
    {
        $product = new Product("mouse", 400.12, 2);
        $cart = new Cart();
        $checkout = new Checkout($cart);

        $cart->addItem($product, 1);
        $checkout->setPaymentMethod("credit card");

        $this->assertNotEmpty($checkout->getPaymentMethod());
    }

}