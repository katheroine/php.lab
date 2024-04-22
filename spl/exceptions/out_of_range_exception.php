<?php

// "Exception thrown when an illegal index was requested.
// This represents errors that should be detected at compile time."
// -- https://www.php.net/manual/en/class.outofrangeexception.php

function pickup($items, $index)
{
    $size = count($items);

    if ($index >= $size) {
        throw new OutOfRangeException('Index is out of range.');
    }

    $item = $items[$index];

    return $item;
}

$things = ['headphones', 'pencil', 'spoon'];

try {
    $result = pickup($things, 2);

    print("Thing: {$result}\n");
} catch (OutOfRangeException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = pickup($things, 3);

    print("Thing: {$result}\n");
} catch (OutOfRangeException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
