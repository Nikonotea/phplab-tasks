<?php

declare(strict_types=1);

/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports): array
{
    $allFirstLetters = [];
    foreach ($airports as $airport) {
        $allFirstLetters[] = ucfirst($airport['name'][0]);
    }
    $uniqueFirstLetters = array_unique($allFirstLetters);
    sort($uniqueFirstLetters);
    return $uniqueFirstLetters;
}

function getAirportsByFirstLetter(array $airports, string $letter): array
{
    $airportsByFirstLetter = [];
    foreach ($airports as $airport) {
        if (ucfirst($airport['name'][0]) === $letter) {
            $airportsByFirstLetter[] = $airport;
        }
    }
    return $airportsByFirstLetter;
}

function getAirportsByState($airports, $state)
{
    return array_filter($airports, function ($s) use ($state) {
        return $s['state'] === $state;
    });
}
