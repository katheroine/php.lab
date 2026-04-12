<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Throwable is the base interface for any object that can be thrown via a throw statement,
// including Error and Exception."
// -- https://www.php.net/manual/en/class.throwable.php

class SomeException extends Exception // implements Throwable
{
}

function someFunction(): void
{
    throw new SomeException();
}

try {
    someFunction();
} catch (SomeException $exception) {
    print($exception . PHP_EOL);
    print($exception->getFile() . PHP_EOL . $exception-> getLine() . PHP_EOL);
    print_r($exception->getTrace());
}
