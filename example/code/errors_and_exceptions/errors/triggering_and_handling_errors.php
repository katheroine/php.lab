<?php

error_reporting(E_ALL);

function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line)
{
    $error = error_get_last();
    if ($error) {
        print($error::class . "\n");
    }
    print("Wow my custom error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]\n");
}

set_error_handler('myCustomErrorHandler');

try {
    echo $someNotSetVariable;
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . "\n");
    print($e::class . "\n");
}

print(PHP_EOL);

try {
    someNoneExistentFunction();
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . "\n");
    print($e::class . "\n");
}

print(PHP_EOL);

try {
    someNotExistentExpression;
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . "\n");
    print($e::class . "\n");
}

print(PHP_EOL);

try {
    trigger_error("Hello, my name is Spookey!", E_USER_ERROR);
} catch (Throwable $e) {
    print("Error catched!\n");
    print($e->getMessage() . "\n");
    print($e::class . "\n");
}

print(PHP_EOL);
