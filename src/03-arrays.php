<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param array $input
 * @return array
 */
function repeatArrayValues(array $input): array
{
    $output = [];
    foreach ($input as $value) {
        for ($i = 1; $i <= $value; $i++) {
            $output[] = $value;
        }
    }
    return $output;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param array $input
 * @return int
 */
function getUniqueValue(array $input): int
{
    if (empty($input)) {
        return 0;
    }
    $arrayUniqueValue = [];
    foreach (array_count_values($input) as $key => $value) {
        if ($value === 1) {
            $arrayUniqueValue[] = $key;
        }
    }
    return $arrayUniqueValue ? min($arrayUniqueValue) : 0;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param array $input
 * @return array
 */
function groupByTag(array $input): array
{
    $listOfNames = [];

    foreach ($input as $item) {
        foreach ($item['tags'] as $tagItem) {
            $listOfNames[$tagItem][] = $item['name'];
        }
    }

    foreach ($listOfNames as &$value) {
        sort($value);
    }

    return $listOfNames;
}
