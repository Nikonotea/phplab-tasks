<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider argumentDataProvider
     */
    public function testCountArguments($expected, $arg)
    {
        $this->assertEquals($expected, countArguments(...$arg));
    }

    public function argumentDataProvider()
    {
        return [
            [['argument_count' => 0, 'argument_values' => []], []],
            [['argument_count' => 1, 'argument_values' => ['test']], ['test']],
            [['argument_count' => 2, 'argument_values' => ['test', 'three']], ['test', 'three']],
            [['argument_count' => 1, 'argument_values' => [null]], [null]]
        ];
    }
}
