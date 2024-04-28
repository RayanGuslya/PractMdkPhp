<?php
echo "Введите первое целое число ";
$a = readline();
echo "Введите второе целое число ";
$b = readline();

$check = true;
while ($check) {
    echo "Введите (+, -, *, /)";
    $deystv = readline();
    $check = false;
    switch ($deystv) {
        case '+':
            echo $a + $b;
            break;
        case '-':
            echo $a - $b;
            break;
        case '*':
            echo $a * $b;
            break;
        case '/':
            if ($b === 0) {
                echo "На ноль делить нельзя \n";
                $check = true;
            } else {
                echo $a / $b;
                break;
            }

        default:
            echo "Неверная операция \n";
            $check = true;
            break;
    }
}
