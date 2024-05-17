<?php
function arrayUnique(array $arr): array
{
    $uniqueArray = [];

    foreach ($arr as $element) {
        if (!in_array($element, $uniqueArray)) {
            $uniqueArray[] = $element;
        }
    }

    return $uniqueArray;
}

// Пример использования
$array = [1, 2, 2, 3, 4, 5, 4, 5, 5];
$uniqueArray = arrayUnique($array);

print_r($uniqueArray);
