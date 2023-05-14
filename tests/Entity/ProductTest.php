<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test for getting ID
     */
    public function testGetId():void
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    /**
     * Test for setting and getting Name
     */
    public function testGetSetName():void
    {
        $product = new Product();
        $name = "Acme Anvil";
        $product->setName($name);
        $this->assertEquals($name, $product->getName());
    }

    /**
     * Test for setting and getting Value
     */
    public function testGetSetValue():void
    {
        $product = new Product();
        $value = 42;
        $product->setValue($value);
        $this->assertEquals($value, $product->getValue());
    }
}