<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

declare(strict_types=1);

// "Exception that represents error in the program logic.
// This kind of exception should lead directly to a fix in your code."
// -- https://www.php.net/manual/en/class.logicexception.php

function quotient($divident, $divisor)
{
    if ($divisor == 0) {
        throw new LogicException('Divisor cannot be zero.');
        // extends Exception
    }

    $quotient = $divident / $divisor;

    return $quotient;
}

try {
    $result = quotient(10, 3);

    print("Total: {$result}\n");
} catch (LogicException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

try {
    $result = quotient(9, 0);

    print("Total: {$result}\n");
} catch (LogicException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
