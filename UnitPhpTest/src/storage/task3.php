<?php
namespace Alexander\UnitPhpTest;
class task3 {
function caesarCipherRussian(string $text, int $key): string
{
    $result = '';

    $alphabet = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';

    $key = $key % mb_strlen($alphabet, 'UTF-8');

    for ($i = 0; $i < mb_strlen($text, 'UTF-8'); $i++) {
        $char = mb_substr($text, $i, 1, 'UTF-8');

        if (preg_match('/[а-я]/ui', $char)) {
            $charPosition = mb_stripos($alphabet, $char);
            $newPosition = ($charPosition + $key) % mb_strlen($alphabet, 'UTF-8');
            $result .= mb_substr($alphabet, $newPosition, 1, 'UTF-8');
        } else {
            $result .= $char;
        }
    }

    return $result;
}
/*

// Ввод текста и сдвига с клавиатуры
echo "Введите текст на русском: ";
$text = readline();
echo "Введите сдвиг (целое число): ";
$key = intval(readline());

// Шифрование
$encryptedText = caesarCipherRussian($text, $key);

echo "Зашифрованный текст: " . $encryptedText . "\n";

*/
}
