<?php
class Book {
    private $title;//название книги, строка
    private $author;//автор книги, строка
    private $ublishedYear;//год публикации книги, целое число
    private $genre;//жанр книги, строка
    function __construct($title, $author,$ublishedYear,$genre){
        $this->title = $title;
        $this->author = $author;
        $this->ublishedYear = $ublishedYear;
        $this->genre = $genre;
    }
    function getBookInfo(): string { //название, автор, год публикации и жанр
        return "title: $this->title, 
        author: $this->author,
        ublishedYear: $this->ublishedYear,
        genre: $this->genre";
    }
    function getTitle(): string {
        return $this->title;
    }
}