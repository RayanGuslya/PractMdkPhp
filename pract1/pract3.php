<?php
echo "ввод a1: \n";
$a1 = readline();
echo "ввод b1: \n";
$b1 = readline();
echo "ввод a2: \n";
$a2 = readline();
echo "ввод b2: \n";
$b2 = readline();
if ($a2 > $b1 || $a1 > $b2){
    echo "пустое множество \n";
}elseif($a1 == $b2){
    echo "1 - ая точка: ";
    echo $a1;
}elseif($a2 == $b1){
    echo "2 - ая точка: ";
    echo $a2;
}else{
    if($a1 >= $a2){
        $a2 = $a1;
    }
    if($b1 <= $b2){
        $b2 = $b1;
        echo "Точка пересечения \n";
        echo $a2;
        echo " ";
        echo $b2;
    }
}

?>