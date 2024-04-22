<?php

declare(strict_types=1);

// "Exception thrown if a callback refers to an undefined method or if some arguments are missing."
// -- https://www.php.net/manual/en/class.badmethodcallexception.php

function total($values, $operations, $adding)
{
    $total = 0;

    if (! method_exists($operations, $adding)) {
        throw new BadMethodCallException('Adding method does not exist.');
    }

    foreach($values as $value) {
        $total = $operations->$adding($total, $value);
    }

    return $total;
}

class MathOperations
{
    function add($value_1, $value_2)
    {
        if (is_string($value_1) || is_string($value_2)) {
            return ($value_1 . $value_2);
        } else {
            return ($value_1 + $value_2);
        }
    }
}

try {
    $elements = [1, 3, 10, 5];
    $result = total($elements, new MathOperations, 'add');

    print("Total: {$result}\n");
} catch (BadFunctionCallException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $elements = [1, 3, 10, 5];
    $result = total($elements, new MathOperations, 'sum');

    print("Total: {$result}\n");
} catch (BadMethodCallException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);