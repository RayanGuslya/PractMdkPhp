<?php

namespace Alexander\UnitPhpTest2;

class Task2
{
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
}