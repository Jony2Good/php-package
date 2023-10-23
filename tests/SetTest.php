<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\SetData;

class SetTest extends TestCase
{
    private SetData $object;
    protected $col;
    protected $colCopy;

    protected function setUp(): void
    {
        $this->object = new SetData();
        $this->coll = [
            'a' => [
                'b' => [
                    'c' => 'd'
                ]
            ]
        ];
        $this->colCopy = $this->col;
    }

    public function testSetWithArguments(): void
    {
        $this->object->set($this->col, ['b'], 'value');
        $this->colCopy['b'] = 'value';
        $this->assertEquals($this->colCopy, $this->col);
    }

    public function testSetEqualsArray(): void
    {
        $this->object->set($this->col, ['a','b', 'c'], 'value');
        $this->colCopy['a']['b']['c'] = 'value';
        $this->assertEquals($this->colCopy, $this->col);
    }

    public function testSetWithNewProperty(): void
    {
        $this->object->set($this->col, ['a','b', 'd'], 'value');
        $this->colCopy['a']['b']['d'] = 'value';
        $this->assertEquals($this->colCopy, $this->col);
    }


}