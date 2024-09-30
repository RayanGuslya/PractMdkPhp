<?php

namespace Alexander\Pract6;

use Alexander\Pract6\Product;
use Alexander\Pract6\ItemOutOfStockException;
use Alexander\Pract6\CartLimitExceededException;

class Cart
{
    private $items = array();
    private $maxItems = 3;

    //Добавляет товар в корзину, выбрасывая ItemOutOfStockException,
    //если запрашиваемое количество превышает наличие, и CartLimitExceededException,
    //если корзина уже содержит максимальное количество товаров.
    public function addItem(Product $product, $quantity): void
    {
        if ($quantity > $product->getStock()) {
            throw new CartLimitExceededException("корзина уже содержит максимальное количество товаров");
        }

        if (count($this->items) >= $this->maxItems) {
            throw new ItemOutOfStockException("запрашиваемое количество превышает наличие");
        }
        $product->reduceStock($quantity);
        $this->items[] = ['product' => $product, 'quantity' => $quantity];
    }

    //Удаляет товар из корзины
    public function removeItem(Product $product): void
    {
        foreach ($this->items as $index => $item) {
            if ($item['product'] === $product) {
                unset($this->items[$index]);
                return;
            }
        }
    }

    //Возвращает общую стоимость товаров в корзине
    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function getItems(): array
    {
        return $this->items;
    }
    public function getMaxItems(): int
    {
        return $this->maxItems;
    }
    public function setMaxItems($maxItems): void
    {
        $this->maxItems = $maxItems;
    }
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

}