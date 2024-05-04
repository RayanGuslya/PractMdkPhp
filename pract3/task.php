<?php
echo "Введите выражение: ";
$str = readline();
$result = calculateExpression($str);
echo "Ответ: " . $result . PHP_EOL;

function calculateExpression($str) : string
{
    if (!preg_match('/^[\d\s\(\)\+\-\*\/\.]+$/', $str)) {
        echo "Ошибка! Введены некорректные символы." . PHP_EOL;
        exit;
    }

    $operands = [];
    $operators = [];
    $currentOperand = '';
    $prevCharIsOperator = true;
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if ($char === '+' || $char === '-' || $char === '*' || $char === '/') {
            if ($currentOperand !== '') {
                $operands[] = $currentOperand;
                $currentOperand = '';
            }
            if ($prevCharIsOperator && ($char === '-' || $char === '+')) {
                $currentOperand .= $char;
            } else {
                $operators[] = $char;
            }
            $prevCharIsOperator = true;
        } elseif ($char === '(') {

            $parenthesesCount = 1;
            $subExpr = '';
            for ($j = $i + 1; $j < strlen($str); $j++) {
                if ($str[$j] === '(') {
                    $parenthesesCount++;
                } elseif ($str[$j] === ')') {
                    $parenthesesCount--;
                    if ($parenthesesCount === 0) {
                        $i = $j;
                        break;
                    }
                }
                $subExpr .= $str[$j];
            }

            $operands[] = calculateExpression($subExpr);
            $prevCharIsOperator = false;
        } else {
            $currentOperand .= $char;
            $prevCharIsOperator = false;
        }
    }

    if ($currentOperand !== '') {
        $operands[] = $currentOperand;
    }


    if (count($operators) >= count($operands)) {
        echo "Ошибка!" . PHP_EOL;
        exit;
    }


    for ($i = 0; $i < count($operators); $i++) {
        if ($operators[$i] === '*' || $operators[$i] === '/') {
            $op = $operators[$i];
            $num1 = array_splice($operands, $i, 1)[0];
            $num2 = array_splice($operands, $i, 1)[0];

            $result = performOperation($num1, $num2, $op);
            if ($result === false) {
                exit;
            }
            $operands[$i] = $result;
            array_splice($operators, $i, 1);
            $i--;
        }
    }

    while (count($operators) > 0) {
        $op = array_shift($operators);
        if (count($operators) == 0 && count($operands) != 1) {
            $num2 = array_shift($operands);
            $num1 = array_shift($operands);
        } else {
            $num1 = array_shift($operands);
            $num2 = array_shift($operands);
        }
        $result = performOperation($num1, $num2, $op);
        if ($result === false) {
            exit;
        }
        $operands[] = $result;
    }
    return $operands[0];
}

function performOperation($num1, $num2, $op) : string
{

    switch ($op) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) {
                echo "Ошибка! Делиние на ноль!" . PHP_EOL;
                return false;
            }
            return $num1 / $num2;
        default:
            echo "Ошибка! Некорректный оператор: $op" . PHP_EOL;
            return false;
    }
}