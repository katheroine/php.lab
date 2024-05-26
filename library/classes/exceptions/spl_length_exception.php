<?php

declare(strict_types=1);

// "Exception thrown if a length is invalid."
// -- https://www.php.net/manual/en/class.lengthexception.php

function primeNumbers($length)
{
    if ($length < 0) {
        throw new LengthException('Length cannot be less than zero.');
        // extends LogicException
    }

    $numbers = [];

    for ($number = 2, $i = 1; $i < $length; $number++) {
        $is_prime = true;
        foreach($numbers as $previous_number) {
            if ($number % $previous_number == 0) {
                $is_prime = false;
                break;
            }
        }

        if (! $is_prime) {
            continue;
        }

        $numbers[] = $number;
        $i++;
    }

    array_unshift($numbers, 1);

    return $numbers;
}

try {
    $result = primeNumbers(5);

    print("Prime numbers:\n");
    print_r($result);
} catch (LengthException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = primeNumbers(-5);

    print("Prime numbers:\n");
    print_r($result);
} catch (LengthException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
