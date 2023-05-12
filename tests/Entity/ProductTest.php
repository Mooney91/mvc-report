<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testGetId()
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    public function testGetSetName()
    {
        $product = new Product();
        $name = "Acme Anvil";
        $product->setName($name);
        $this->assertEquals($name, $product->getName());
    }

    public function testGetSetValue()
    {
        $product = new Product();
        $value = 42;
        $product->setValue($value);
        $this->assertEquals($value, $product->getValue());
    }
}