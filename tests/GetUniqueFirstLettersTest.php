<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
            [[
                ["name" => "Austin Bergstrom International Airport"],
                ["name" => "Baltimore Washington Airport"],
                ["name" => "Charleston International Airport"],
                ["name" => "Kansas City International Airport"],
                ["name" => "Washington Ronald Reagan National Airport"],
                ["name" => "Orlando International Airport"]
            ], ['A', 'B', 'C', 'K', 'O', 'W']
            ]
        ];
    }
}
