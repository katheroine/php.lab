<?php

declare(strict_types=1);

// "Exception thrown if a value does not adhere to a defined valid data domain."
// -- https://www.php.net/manual/en/class.domainexception.php

function pickup($items, $index)
{
    $size = count($items);

    if (! is_numeric($index) || ($index < 0)) {
        throw new DomainException('Index must be numeric conversable to integer greater than zero.');
    }

    $index = intval($index);
    $item = $items[$index];

    return $item;
}

$things = ['headphones', 'pencil', 'spoon'];

try {
    $result = pickup($things, 2);

    print("Thing: {$result}\n");
} catch (DomainException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = pickup($things, '2');

    print("Thing: {$result}\n");
} catch (DomainException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = pickup($things, '2.5');

    print("Thing: {$result}\n");
} catch (DomainException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = pickup($things, '-2');

    print("Thing: {$result}\n");
} catch (DomainException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = pickup($things, 'a');

    print("Thing: {$result}\n");
} catch (DomainException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);