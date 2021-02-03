<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testPositive($expected)
    {
        $this->assertEquals($expected, sayHello(), "actual value is not equals to expected");
    }

    public function positiveDataProvider()
    {
        return [
            ['Hello']
            ];
    }
}
