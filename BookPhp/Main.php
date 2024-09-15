<?php
require __DIR__ . '/vendor/autoload.php';

use Alexander\BookPhp\Book;
use Alexander\BookPhp\Libary;

$libary = new Libary();
while(true) {
echo "1-добавить книгу".PHP_EOL;
echo "2-удалить книгу по её названию".PHP_EOL;
echo "3-возвращает массив книг написанным автором".PHP_EOL;
echo "4-возвращает массив всех книг с их информацией".PHP_EOL;
$num = readline();
switch ($num) {
    case 1:
    echo "title: ";
    $title = readline();
    echo "author: ";
    $author = readline();
    echo "publishedYear: ";
    $publishedYear = readline();
    echo "genre: ";
    $genre = readline();
    $libary->addBook(new Book($title, $author,$publishedYear,$genre));
        break;
    case 2:
        echo "Введите название книги: ";
        $title = readline();
        $libary->removeBookByTile($title);
        break;
    case 3:
        echo "Введите автора книги: ";
        $author = readline();
        foreach($libary->findBooksByAuthor($author) as $booksByAuthor) { 
            echo $booksByAuthor.PHP_EOL;
        }
        break;
    case 4:
        $allBooks = $libary->listAllBooks();
        if (count($allBooks) > 0) {
            foreach($allBooks as $book){
                echo $book.PHP_EOL;
            }
        } else {
            echo "Книг нету";
        }
        break;
    default: 
        echo "Неверный выбор";
        break;
    }
}
?>