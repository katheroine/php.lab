<?php

// "Exception thrown to indicate range errors during program execution.
// Normally this means there was an arithmetic error other than under/overflow.
// This is the runtime version of DomainException."
// -- https://www.php.net/manual/en/class.rangeexception.php

function drawIndex($size) {
    $maxIndex = $size - 1;
    $input = trim(readline("Index (0 - {$maxIndex}): "));

    if ($input >= $size || $input < 0) {
        throw new RangeException('Index is out of range.');
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
} catch (RangeException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
