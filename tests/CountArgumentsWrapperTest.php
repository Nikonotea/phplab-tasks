<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive(...$input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper(...$input);
    }

    public function positiveDataProvider()
    {
        return [
            [['test']],
            [1, 2, 3],
            [null],
            [true, '123'],
            [false, '123'],
            ['123', 123, '234']
        ];
    }
}
