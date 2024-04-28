<?php
echo "Основные цвета: \n";
echo "Красный \n";
echo "Синий \n";
echo "Желтый \n";
$restart = true;
while ($restart) {
    echo "Введите два цвета для смешивания \n";
    $color1 = readline();
    $color2 = readline(); 
    $restart = false;
if($color1 == 'Красный' && $color2 == 'Желтый' || $color1 == 'Желтый' && $color2 == 'Красный'){
    echo 'получился оранжевый';
}
elseif($color1 == 'Красный' && $color2 == 'Синий' || $color1 == 'Синий' && $color2 == 'Красный'){
    echo 'получился фиолетовый';
}
elseif($color1 == 'Синий' && $color2 == 'Желтый' || $color1 == 'Синий' && $color2 == 'Желтый'){
    echo 'получился зеленый';
}else{
    echo "Введите заного \n";
    $restart = true;
}
}



