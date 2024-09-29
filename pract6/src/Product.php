<?php

namespace Alexander\Pract6;

class Product
{
    private $name;
    private $price;
    private $stock;

    public function __construct($name, $price, $stock)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    //Уменьшает количество единиц на складе, выбрасывая OutOfStockException, если количество становится меньше 0.
    public function reduceStock($quantity): void
    {
        if ($this->stock < $quantity) {
            throw new OutOfStockException("недостаточно товара на складе");
        }
        $this->stock -= $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getStock(): int
    {
        return $this->stock;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
}
