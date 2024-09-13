<?php
require 'Book.php';
class Libary {
    private $books = array();
    function addBook(Book $book): void {
        $this->books[] = $book;
    }
    function removeBookByTile($title) {
        foreach($this->books as $removeBooks) {
            echo $removeBooks;
        }
    }
    function findBooksByAuthor($author) {

    }
    function listAllBooks() {

    }
}