<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\DivideCommand;

class DivideCommandTest extends TestCase
{
    /**
     * @var DivideCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new DivideCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [10, 2, 5],
            [0.4, 0.2, 2],
            [-2, 1, -2],
            ['6', 2, 3],
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