<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\MultiplyCommand;

class MultiplyCommandTest extends TestCase
{
    /**
     * @var MultiplyCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new MultiplyCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [10, 10, 100],
            [0.5, 0.5, 0.25],
            [-1, 1, -1],
            ['5', 5, 25],
        ];
    }

    /**
     * @dataProvider commandPositiveDataProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testCommandPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    public function testCommandNegative()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->command->execute(1);
    }

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function tearDown(): void
    {
        unset($this->command);
    }
}