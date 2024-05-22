<?php

declare(strict_types=1);

// "Exception thrown if a value is not a valid key. This represents errors that cannot be detected at compile time."
// -- https://www.php.net/manual/en/class.outofboundsexception.php

function drawIndex($size) {
    $maxIndex = $size - 1;
    $input = trim(readline("Index (0 - {$maxIndex}): "));

    if (! is_numeric($input) || $input >= $size || $input < 0) {
        throw new OutOfBoundsException('Index is not numeric or out of range.');
    }

    return $input;
}

function pickup($items)
{
    $size = count($items);
    $index = drawIndex($size);

    $item = $items[$index];

    return $item;
}

$things = ['headphones', 'pencil', 'spoon'];

try {
    $result = pickup($things);

    print("Thing: {$result}\n");
} catch (OutOfBoundsException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
