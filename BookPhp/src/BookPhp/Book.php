<?php
namespace Alexander\BookPhp;
class Book
{
    private $title;//название книги, строка
    private $author;//автор книги, строка
    private $publishedYear;//год публикации книги, целое число
    private $genre;//жанр книги, строка

    function __construct($title, $author, $ublishedYear, $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $ublishedYear;
        $this->genre = $genre;
    }

    public function getBookInfo(): string
    { //название, автор, год публикации и жанр
        return "title: $this->title, 
        author: $this->author,
        ublishedYear: $this->publishedYear,
        genre: $this->genre";
    }

    //get
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getPublishedYear(): int
    {
        return $this->publishedYear;
    }
    public function getGenre(): string
    {
        return $this->genre;
    }
    //set
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setPublisheYear($publishedYear)
    {
        $this->publishedYear = $publishedYear;
    }
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
    public function __toString(): string
    {
        return "title: {$this->title}, author: {$this->author}, publishedYear: {$this->publishedYear}, genre: {$this->genre}";
    }
}
