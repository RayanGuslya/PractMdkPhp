<?php

use Alexander\Pract6\Product;
use Alexander\Pract6\Cart;
use \PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testCartTotalSame()
    {
        $product = new Product("mouse", 400, 1);
        $product2 = new Product("keyboard", 250.2, 2);
        $cart = new Cart();

        $cart->addItem($product, 1);
        $cart->addItem($product2, 2);

        $this->assertSame($cart->getTotal(), 900.4);
    }

    public function testCartRemoveEquals()
    {
        $product = new Product("mouse", 400, 1);
        $product2 = new Product("keyboard", 250.2, 2);
        $cart = new Cart();

        $cart->addItem($product, 1);
        $cart->addItem($product2, 2);
        $cart->removeItem($product2);

        $this->assertEquals(count($cart->getItems()), 1);
    }
}