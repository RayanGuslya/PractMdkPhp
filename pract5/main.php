<?php
require __DIR__ . '/vendor/autoload.php';

use Alexander\Pract5\PizzaStore;

$pizzaStore = new PizzaStore();
$startGame = true;
echo "-------------меню-------------- \n";
echo "1 - сырная \n";
echo "2 - пепперони \n";
echo "3 - вегетарианская \n";
echo "------------------------------- \n";
$num = readline();
while ($startGame) {
    switch ($num) {
        case 1:
            $pizzaStore->orderPizza("сырная");
            break;
        case 2:
            $pizzaStore->orderPizza("пепперони");
            break;
        case 3:
            $pizzaStore->orderPizza("вегетарианская");
            break;
        default:
            $startGame = true;
            echo 'вне диапазона';
            break;
    }
    $startGame = false;
}
