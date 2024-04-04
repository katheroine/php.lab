<?php
declare(strict_types=1);

function someFunction(int $someArgument)
{
}

try {
    someFunction("hello");
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    someFunction();
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    json_decode('{}', true, -1);
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    8 >> -1;
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    1/0;
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    assert(1 > 2);
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);

try {
    match("hello") {};
} catch (Exception $exception) {
    print("Exception catched!\n");
    print($exception->getMessage() . "\n");
    print($exception::class . "\n");
} catch (Error $error) {
    print("Error catched!\n");
    print($error->getMessage() . "\n");
    print($error::class . "\n");
}

print(PHP_EOL);
