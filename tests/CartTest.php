<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\Cart;

class CartTest extends TestCase
{
    private $good;
    private $count;
    private Cart $object;

    protected function setUp(): void
    {
        $this->good = [];
        $this->count = 3;
        $this->object = new Cart();
    }

    public function testCartEmptyArray(): void
    {
        $this->assertCount(0, $this->object->getItems());
    }

    public function testCartCountItemsOne(): void
    {
        $this->good = ['name' => 'car', 'price' => 100];
        $this->object->addItem($this->good, $this->count);
        $this->assertCount(1, $this->object->getItems());
    }

    public function testCartCountItemsTwo(): void
    {
        $this->good = ['name' => 'car', 'price' => 100];
        $this->count = 5;
        $this->object->addItem($this->good, $this->count);
        $this->assertEquals(1, count($this->object->getItems()));
        $this->assertEquals(500, $this->object->getCost());
        $this->assertEquals(5, $this->object->getCount());
    }
}