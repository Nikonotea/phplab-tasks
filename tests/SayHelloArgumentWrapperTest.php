<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider exceptionDataProvider
     * @param $input
     */
    public function testExceptionalCase($input)
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper($input);
    }

    public function exceptionDataProvider()
    {
        return [
            [NULL],
            [[1, 2, 3]]
        ];
    }
}


