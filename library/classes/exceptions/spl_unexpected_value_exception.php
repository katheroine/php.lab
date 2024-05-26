<?php

declare(strict_types=1);

// "Exception thrown if a value does not match with a set of values.
// Typically this happens when a function calls another function and expects the return value
// to be of a certain type or value not including arithmetic or buffer related errors."
// -- https://www.php.net/manual/en/class.unexpectedvalueexception.php

function total($values)
{
    $total = 0;

    foreach($values as $value) {
        $partial = add($total, $value);
        if (! (is_integer($partial) || is_float($partial))) {
            throw new UnexpectedValueException('Each value is supposed to be number.');
            // extends RuntimeException
        }
        $total = $partial;
    }

    return $total;
}

function add($value_1, $value_2)
{
    if (is_string($value_1) || is_string($value_2)) {
        return ($value_1 . $value_2);
    } else {
        return ($value_1 + $value_2);
    }
}

try {
    $elements = [1, 3, 10, 5];
    $result = total($elements);

    print("Total: {$result}\n");
} catch (UnexpectedValueException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $elements = [1, 3, '10', 5];
    $result = total($elements);

    print("Total: {$result}\n");
} catch (UnexpectedValueException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
