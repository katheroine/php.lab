<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */


function someFunction(int $someArgument)
{
}

try {
    someFunction("hello");
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    someFunction();
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    json_decode('{}', true, -1);
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    8 >> -1;
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    1/0;
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    assert(1 > 2);
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);

try {
    match("hello") {};
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . PHP_EOL);
    print($exception::class . PHP_EOL);
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . PHP_EOL);
    print($error::class . PHP_EOL);
}

print(PHP_EOL);
