<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\ExponentCommand;

class ExponentCommandTest extends TestCase
{
    /**
     * @var ExponentCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new ExponentCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [2, 2, 4],
            [0.2, 2, 0.04],
            [-2, 2, 4],
            ['2', 2, 4],
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