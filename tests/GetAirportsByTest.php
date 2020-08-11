<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GetAirportsByTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $param, $expected)
    {
        $this->assertEquals($expected, getAirportsByState($input, $param));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    ["state" => "New Mexico"],
                    ["state" => "Georgia"],
                    ["state" => "Texas"],
                    ["state" => "Tennessee"],
                    ["state" => "Idaho"],
                    ["state" => "Georgia"],
                    ["state" => "Virginia"],
                    ["state" => "Ohio"],
                    ["state" => "Georgia"],
                    ["state" => "Minnesota"],
                    ["state" => "Florida"],
                ],
                'Georgia',
                [
                    ["state" => "Georgia"],
                    ["state" => "Georgia"],
                    ["state" => "Georgia"]
                ]
            ],
            [
                [
                    ["state" => "New Mexico"],
                    ["state" => "Georgia"],
                    ["state" => "Texas"],
                    ["state" => "Tennessee"],
                    ["state" => "Idaho"]
                ],
                'Tennessee',
                [
                    [
                        "state" => "Tennessee"
                    ]
                ]
            ]
        ];
    }
}
