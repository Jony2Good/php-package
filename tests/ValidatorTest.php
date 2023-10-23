<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\Validator;

class ValidatorTest extends TestCase
{
  private Validator $object;

    protected function setUp(): void
    {
        $this->object = new Validator();
    }

    public function testIsValidReturnMethodTrue(): void
    {
        $this->assertTrue($this->object->isValid(5));
    }

    public function testIsValidReturnMethodFalse(): void
    {
        $this->object->addCheck(fn($v) => is_integer($v));
        $this->assertFalse($this->object->isValid('value'));
    }

    public function testIsValidMethodWithArguments(): void
    {
        $this->object->addCheck(fn($v) => $v > 10);
        $this->assertTrue($this->object->isValid(15));

        $this->object->addCheck(fn($v) => $v % 2 === 0);
        $this->assertTrue($this->object->isValid(32));
    }

    public function testIsValidChekTypes(): void
    {
        $this->object->addCheck(fn($v) => gettype($v) === 'object');
        $this->assertFalse($this->object->isValid(\Exception::class));
    }
}