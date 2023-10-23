<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\Storage;

class StorageTest extends TestCase
{
  private Storage $object;

    protected function setUp(): void
    {
        $this->object = new Storage();
    }
    public function testGet(): void
    {
        $actual1 = $this->object->get([1, 2, 3, 4], 2, 'value');
        $this->assertEquals(3, $actual1);

        $actual2 = $this->object->get([1, 2, 3, 4], 7, 'value');
        $this->assertEquals('value', $actual2);

        $actual3 = $this->object->get([1, 2, 3, 4], 7);
        $this->assertNull($actual3);

        $actual4 = $this->object->get([1, 2, 3, 4], -1, 'value');
        $this->assertEquals('value', $actual4);

        $actual5 = $this->object->get([], -1, 'value');
        $this->assertEquals('value', $actual5);

        $actual6 = $this->object->get([], 5);
        $this->assertNull($actual6);
    }

    public function testSlice(): void
    {
        $actual1 = $this->object->slice([1, 2, 3, 4, 5, 6], 1, 4);
        $this->assertEquals([2, 3, 4], $actual1);

        $actual2 = $this->object->slice([]);
        $this->assertEmpty($actual2);

        $actual3 = $this->object->slice([3,4,5], -100, 50);
        $this->assertEquals([3,4,5], $actual3);

        $actual4 = $this->object->slice([3,4,5], 0, -20);
        $this->assertEquals([], $actual4);

        $actual5 = $this->object->slice([3,4,5], 4);
        $this->assertEmpty($actual5);

        $actual6 = $this->object->slice([1, 2, 3, 4], -10, 10);
        $this->assertEquals([1, 2, 3, 4], $actual6);
    }

    public function testIndexOf(): void
    {
        $actual1 = $this->object->indexOf([], 2);
        $this->assertEquals(-1, $actual1);

        $actual2 = $this->object->indexOf([1,2,3,2,5], 5, -1);
        $this->assertEquals(4, $actual2);

        $actual3 = $this->object->indexOf([], 0);
        $this->assertEquals(-1, $actual3);

        $actual4 = $this->object->indexOf([1,2,3,2,5], 2, -3);
        $this->assertEquals(3, $actual4);

        $actual5 = $this->object->indexOf([1, 2, 2], 2, -10);
        $this->assertEquals(1, $actual5);
    }
}