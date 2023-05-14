<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{

    /**
     * Test for getting ID
     */
    public function testGetId():void
    {
        $library = new Library();
        $this->assertNull($library->getId());
    }

    /**
     * Test for setting and getting Title
     */
    public function testGetSetTitle():void
    {
        $library = new Library();
        $title = "Test Title";
        $library->setTitle($title);
        $this->assertEquals($title, $library->getTitle());
    }

    /**
     * Test for setting and getting Author
     */
    public function testGetSetAuthor():void
    {
        $library = new Library();
        $author = "Test Author";
        $library->setAuthor($author);
        $this->assertEquals($author, $library->getAuthor());
    }

    /**
     * Test for setting and getting ISBN
     */
    public function testGetSetIsbn():void
    {
        $library = new Library();
        $isbn = "123456789";
        $library->setIsbn($isbn);
        $this->assertEquals($isbn, $library->getIsbn());
    }

    /**
     * Test for setting and getting Picture
     */
    public function testGetSetPicture():void
    {
        $library = new Library();
        $picture = "test.jpg";
        $library->setPicture($picture);
        $this->assertEquals($picture, $library->getPicture());
    }
}