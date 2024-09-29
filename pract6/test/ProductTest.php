<?php

use Alexander\Pract6\Product;
use \PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAddProductEquals()
    {
        $product = new Product("mouse", 400.12, 2);
        $product->reduceStock(1);

        $this->assertEquals($product->getName(), "mouse");
        $this->assertEquals($product->getPrice(), 400.12);
        $this->assertEquals($product->getStock(), 1);
    }
}