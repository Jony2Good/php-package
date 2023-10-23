<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\Fillable;
use Unit\Storage;

class FillableTest extends TestCase
{
    private Fillable $object;

    protected function setUp(): void
    {
        $this->object = new Fillable();
    }

    public function testFillArrayWithSingleValue()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $expected = [10, 10, 10, 10, 10];

        $result = $this->object->fill($input, $value);
        $this->assertEquals($expected, $result);
    }

    public function testFillArrayWithSingleValueAndStartIndex()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $start = 2;
        $expected = [1, 2, 10, 10, 10];

        $result = $this->object->fill($input, $value, $start);
        $this->assertEquals($expected, $result);
    }

    public function testFillArrayWithSingleValueAndStartEndIndexes()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $start = 1;
        $end = 3;
        $expected = [1, 10, 10, 4, 5];

        $result = $this->object->fill($input, $value, $start, $end);
        $this->assertEquals($expected, $result);
    }

    public function testFillArrayWithSingleValueAndEndIndexGreaterThanArraySize()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $end = 8;
        $expected = [10, 10, 10, 10, 10];

        $result = $this->object->fill($input, $value, 0, $end);
        $this->assertEquals($expected, $result);
    }

    public function testFillArrayWithSingleValueAndStartEndIndexesOutOfRange()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $start = 4;
        $end = 2;
        $expected = [1, 2, 3, 4, 5];

        $result = $this->object->fill($input, $value, $start, $end);
        $this->assertEquals($expected, $result);
    }

    public function testFillArrayWithTheSameArrayRange()
    {
        $input = [1, 2, 3, 4, 5];
        $value = 10;
        $start = 5;
        $expected = [1, 2, 3, 4, 5];

        $result = $this->object->fill($input, $value, $start);
        $this->assertEquals($expected, $result);
    }
}