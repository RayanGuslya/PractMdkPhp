<?php
require ('Pizza.php');
class PizzaStore {
public function orderPizza($type) { // заказ пиццы
    $pizza = $this->createPizza($type);
    $pizza->prepare();
    $pizza->cut();
}
private function createPizza($type): Pizza {
    switch ($type) {
        case 'сырная':
            return new Pizza('Сырная', 'томатный', ['сыр']);
        case 'пепперони':
            return new Pizza('Пепперони', 'томатный', ['сыр', 'колбаса пепперони']);
        case 'вегетарианская':
            return new Pizza('Вегетарианская', 'томатный', ['грибы', 'перец', 'мясо']);
        default:
            throw new Exception("есть только 3 вида");
    }
}
}