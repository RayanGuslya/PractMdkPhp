<?php

namespace Alexander\Pract6;

use Alexander\Pract6\Cart;

class Checkout
{
    private Cart $cart;//Объект корзины
    private $paymentMethod;//Метод оплаты (например, "credit card").

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    //Устанавливает метод оплаты
    public function setPaymentMethod($method): void
    {
        $this->paymentMethod = $method;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    //Обрабатывает оплату, выбрасывая PaymentGatewayException, 
    //если оплата не проходит, и InsufficientFundsException, 
    //если на счету недостаточно средств
    public function processPayment($amount): void
    {
        if ($amount > 10000) {
            throw new InsufficientFundsException("на счету недостаточно средств");
        }
        if ($this->paymentMethod != "credit card") {
            throw new PaymentGatewayException("оплата не проходит");
        }
        echo "Оплата выполнена картой:" . $this->paymentMethod . PHP_EOL;
    }

    //Завершает заказ, вызывая метод processPayment
    //с общей стоимостью из корзины и обрабатывает исключения.
    public function finalizeOrder(): void
    {
        try {
            $total = $this->cart->getTotal();
            $this->processPayment($total);
        } catch (InsufficientFundsException $e) {
            echo "InsufficientFundsException: " . $e->getMessage() . PHP_EOL;
        } catch (PaymentGatewayException $e) {
            echo "PaymentGatewayException" . $e->getMessage() . PHP_EOL;
        }

    }
}