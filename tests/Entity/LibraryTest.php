<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{
    public function testGetId()
    {
        $library = new Library();
        $this->assertNull($library->getId());
    }

    public function testGetSetTitle()
    {
        $library = new Library();
        $title = "Test Title";
        $library->setTitle($title);
        $this->assertEquals($title, $library->getTitle());
    }

    public function testGetSetAuthor()
    {
        $library = new Library();
        $author = "Test Author";
        $library->setAuthor($author);
        $this->assertEquals($author, $library->getAuthor());
    }

    public function testGetSetIsbn()
    {
        $library = new Library();
        $isbn = "123456789";
        $library->setIsbn($isbn);
        $this->assertEquals($isbn, $library->getIsbn());
    }

    public function testGetSetPicture()
    {
        $library = new Library();
        $picture = "test.jpg";
        $library->setPicture($picture);
        $this->assertEquals($picture, $library->getPicture());
    }
}