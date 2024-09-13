<?php
require 'Book.php';
class Libary {
    private $books = array();
    function addBook(Book $book): void {
        $this->books[] = $book;
    }
    function removeBookByTile($title): void {
        foreach($this->books as $index => $book){
            if($book->getTitle() === $title){
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return;
            }
        }
    }
    function findBooksByAuthor($author): array {
        $booksByAuthor = array();
        foreach ($this->books as $book){
            if ($book->getAuthor() == $author){
                $booksByAuthor[] = $book;
            }
        }
        return $booksByAuthor;
    }
    function listAllBooks(): array {
        return $this->books;
    }
}