<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    public function testExceptionalCase()
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper(0.001);
    }
}
