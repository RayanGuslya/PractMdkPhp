<?php
require('TomatoBush.php');
require('Gardener.php');
echo "Придумайе имя садовнику: ";
$name = readline();
echo "Количество кустов: ";
$countBush = readline();

$tomatoBush = new TomatoBush($countBush);
$gardener = new Gardener($name, $tomatoBush);

$startGame = true;
while ($startGame) {
    echo "--------------Меню----------------" . PHP_EOL;
    echo "1 - справка по садоводству" . PHP_EOL;
    echo "2 - ухаживать за кустом с помидорами" . PHP_EOL;
    echo "3 - собрать урожай" . PHP_EOL;
    echo "----------------------------------" . PHP_EOL;
    $select = readline();

    switch ($select) {
        case 1:
            echo $gardener::KnowledgeBase();
            break;
        case 2:
            $gardener->work();
            break;
        case 3:
            $gardener->harvest();
            break;
        default:
            echo "error" . PHP_EOL;
            $startGame = true;
            break;
    }
}
