<?php

declare(strict_types=1);

// "Exception thrown if an argument is not of the expected type."
// -- https://www.php.net/manual/en/class.invalidargumentexception.php

function total($values)
{
    $total = 0;

    foreach($values as $value) {
        if (! is_numeric($value)) {
            throw new InvalidArgumentException('Each value is supposed to be numeric.');
        }
        $total += $value;
    }

    return $total;
}

try {
    $elements = [1, 3, '10', 5];
    $result = total($elements);

    print("Total: {$result}\n");
} catch (InvalidArgumentException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $elements = [1, 3, 'rose', 5];
    $result = total($elements);

    print("Total: {$result}\n");
} catch (InvalidArgumentException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
