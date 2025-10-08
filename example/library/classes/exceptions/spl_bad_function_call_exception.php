<?php

declare(strict_types=1);

// "Exception thrown if a callback refers to an undefined function or if some arguments are missing."
// -- https://www.php.net/manual/en/class.badfunctioncallexception.php

function total($values, $adding)
{
    $total = 0;

    if (! function_exists($adding)) {
        throw new BadFunctionCallException('Adding function does not exist.');
        // extends LogicException
    }

    foreach($values as $value) {
        $total = $adding($total, $value);
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
    $result = total($elements, 'add');

    print("Total: {$result}\n");
} catch (BadFunctionCallException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $elements = [1, 3, 10, 5];
    $result = total($elements, 'sum');

    print("Total: {$result}\n");
} catch (BadFunctionCallException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
