<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GetAirportsByFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getAirportsByFirstLetter($input, 'A'));
    }

    public function positiveDataProvider()
    {
        return [
            [[
                ["name" => "Austin Bergstrom International Airport"],
                ["name" => "Baltimore Washington Airport"],
                ["name" => "Atlanta Hartsfield International Airport"],
                ["name" => "Charleston International Airport"],
                ["name" => "Kansas City International Airport"],
                ["name" => "Washington Ronald Reagan National Airport"],
                ["name" => "Orlando International Airport"]
            ], [
                ["name" => "Austin Bergstrom International Airport"],
                ["name" => "Atlanta Hartsfield International Airport"]
            ]
            ]
        ];
    }
}
