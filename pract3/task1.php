<?php
$num = 0;
function mostRecent(string $text, int $num): string
{
    $num;
    //счет символов в тексте
    $wordsNum = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    for ($i = 0; $i < count($wordsNum); $i++) {
        $tmp = $wordsNum[$i];
        for ($j = 0; $j < strlen($tmp); $j++) {
            $num++;
        }
    }
    if ($num < 1000) {
        $cleanedText = preg_replace('/[^\p{L}\p{N}]+/iu', ' ', strtolower($text));
        //echo "test: ".$cleanedText.PHP_EOL;
        // Разбиваем текст на слова
        $words = preg_split('/\s+/', $cleanedText, -1, PREG_SPLIT_NO_EMPTY);

        $wordCounts = array_count_values($words);

        arsort($wordCounts);
        $mostCommonWord = key($wordCounts);
    } else {
        $mostCommonWord = "Большой текст(до 1000 символов)";
    }
    return $mostCommonWord;
}

$text = "The House
Mr. and Mrs. Smith have one son and one daughter. The sons name is John. The daughter's name is Sarah.
The Smiths live in a house. They have a living room. They watch TV in the living room. The father cooks food in the kitchen. 
They eat in the dining room. The house has two bedrooms. They sleep in the bedrooms. They keep their clothes in the closet. There is one bathroom. 
They brush their teeth in the bathroom.
The house has a garden. John and Sarah play in the garden. They have a dog. John and Sarah like to play with the dog.";
echo "RESULT: " . mostRecent($text, $num);
