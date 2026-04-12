<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

error_reporting(E_ALL);

function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line)
{
    $error = error_get_last();
    if ($error) {
        print($error::class . PHP_EOL);
    }
    print("Wow my custom error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]\n");
}

set_error_handler('myCustomErrorHandler');

try {
    echo $someNotSetVariable;
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . PHP_EOL);
    print($e::class . PHP_EOL);
}

print(PHP_EOL);

try {
    someNoneExistentFunction();
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . PHP_EOL);
    print($e::class . PHP_EOL);
}

print(PHP_EOL);

try {
    someNotExistentExpression;
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . PHP_EOL);
    print($e::class . PHP_EOL);
}

print(PHP_EOL);

try {
    trigger_error("Hello, my name is Spookey!", E_USER_ERROR);
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . PHP_EOL);
    print($e::class . PHP_EOL);
}

print(PHP_EOL);
