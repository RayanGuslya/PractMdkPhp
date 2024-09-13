<?php
require 'Libary.php';
$libary = new Libary();
while(true) {
echo "1-добавить книгу";
echo "2-удалить книгу по её названию";
echo "3-возвращает массив книг написанным автором";
echo "4-возвращает массив всех книг с их информацией";
$num = readline();
switch ($num) {
    case 1:
    echo "title: ";
    $title = readline();
    echo " author: ";
    $author = readline();
    echo " ublishedYear: ";
    $ublishedYear = readline();
    echo " genre: ";
    $genre = readline();
    $libary->addBook(new Book($title, $author,$ublishedYear,$genre));
    #$this->books[] = new Book($title,$author,$ublishedYear,$genre);
        break;
    case 2:
        break;
    case 3:
        break;
    case 4:
        break;
    }
}