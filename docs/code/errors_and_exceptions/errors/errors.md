[⌂ Home](../../../../README.md)
[▲ Previous: Traits](../../classes_interfaces_traits/traits/traits.md)
[▼ Next: Exceptions](../exceptions/exceptions.md)

# Errors

## Description

PHP reports ***errors*** in response to a number of *internal error* conditions. These may be used to signal a number of different conditions, and can be displayed and/or logged as required.

Every *error* that PHP generates includes a *type*. A list of these *error types* is available, along with a short description of their behaviour and how they can be caused.

-- [PHP Reference](https://www.php.net/manual/en/language.errors.basics.php#language.errors.basics)

## Handling errors

If no *error handler* is set, then PHP will handle any *errors* that occur according to its configuration. Which *errors* are reported and which are ignored is controlled by the `error_reporting` `php.ini` *directive*, or at runtime by calling `error_reporting()`. It is strongly recommended that the configuration *directive* be set, however, as some `errors` can occur before execution of your script begins.

In a development environment, you should always set `error_reporting` to `E_ALL`, as you need to be aware of and fix the issues raised by PHP. In production, you may wish to set this to a less verbose level such as `E_ALL & ~E_NOTICE & ~E_DEPRECATED`, but in many cases `E_ALL` is also appropriate, as it may provide early warning of potential issues.

What PHP does with these *errors* depends on two further `php.ini` *directives*. `display_errors` controls whether the *error* is shown as part of the script's output. This should always be disabled in a production environment, as it can include confidential information such as database passwords, but is often useful to enable in development, as it ensures immediate reporting of issues.

In addition to displaying *errors*, PHP can log *errors* when the `log_errors` directive is enabled. This will log any *errors* to the file or `syslog` defined by `error_log`. This can be extremely useful in a production environment, as you can log errors that occur and then generate reports based on those *errors*.

-- [PHP Reference](https://www.php.net/manual/en/language.errors.basics.php#language.errors.basics.handling)

## User error handlers

If PHP's *default error handling* is inadequate, you can also handle many *types* of *error* with your own custom *error handler* by installing it with `set_error_handler()`. While some *error* types cannot be handled this way, those that can be handled can then be handled in the way that your script sees fit: for example, this can be used to show a custom *error* page to the user and then report more directly than via a log, such as by sending an e-mail.

-- [PHP Reference](https://www.php.net/manual/en/language.errors.basics.php#language.errors.basics.user)

*Example: Triggering and handling errors*

```php
Wow my custom error handler got #[2] occurred in [/projects/php.lab/examples/code/errors_and_exceptions/errors/triggering_and_handling_errors.php] at line [17]: [Undefined variable $someNotSetVariable]

Error catched!
Call to undefined function someNoneExistentFunction()
Error

Error catched!
Undefined constant "someNotExistentExpression"
Error

Wow my custom error handler got #[8192] occurred in [/projects/php.lab/examples/code/errors_and_exceptions/errors/triggering_and_handling_errors.php] at line [47]: [Passing E_USER_ERROR to trigger_error() is deprecated since 8.4, throw an exception or call exit with a string message instead]
Wow my custom error handler got #[256] occurred in [/projects/php.lab/examples/code/errors_and_exceptions/errors/triggering_and_handling_errors.php] at line [47]: [Hello, my name is Spookey!]

```

**Result (PHP 8.4)**:

```php
<?php

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

```

**Source code**:
[Example](../../../../examples/code/errors_and_exceptions/errors/triggering_and_handling_errors.php)

## Errors as exceptions

PHP 7 changes how most *errors* are reported by PHP. Instead of reporting *errors* through the traditional *error reporting* mechanism used by PHP 5, most *errors* are now reported by *throwing* `Error` *exceptions*.

As with normal *exceptions*, these `Error` *exceptions* will bubble up until they reach the first matching *`catch` block*. If there are no matching blocks, then any default *exception handler* installed with `set_exception_handler()` will be called, and if there is no *default exception handler*, then the *exception* will be converted to a *fatal error* and will be handled like a traditional *error*.

As the `Error` hierarchy does not inherit from `Exception`, code that uses `catch (Exception $e) { ... }` blocks to handle uncaught *exceptions* in PHP 5 will find that these `Errors` are not caught by these blocks. Either a `catch (Error $e) { ... }` block or a `set_exception_handler()` handler is required.

-- [PHP Reference](https://www.php.net/manual/en/language.errors.php7.php#language.errors.php7)

*Example: Catching errors*

```php
<?php
declare(strict_types=1);

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

```

**Result (PHP 8.4)**:

```
Error catched!
someFunction(): Argument #1 ($someArgument) must be of type int, string given, called in /media/storage/repository/php/php.lab/examples/code/errors_and_exceptions/errors/catching_errors.php on line 9
TypeError

Error catched!
Too few arguments to function someFunction(), 0 passed in /media/storage/repository/php/php.lab/examples/code/errors_and_exceptions/errors/catching_errors.php on line 23 and exactly 1 expected
ArgumentCountError

Error catched!
json_decode(): Argument #3 ($depth) must be greater than 0
ValueError

Error catched!
Bit shift by negative number
ArithmeticError

Error catched!
Division by zero
DivisionByZeroError


Error catched!
Unhandled match case of type string
UnhandledMatchError

```

**Source code**:
[Example](../../../../examples/code/errors_and_exceptions/errors/catching_errors.php)

## Error hierarchy

* `Throwable`
* `Error`
* `ArithmeticError`
* `DivisionByZeroError`
* `AssertionError`
* `CompileError`
* `ParseError`
* `TypeError`
* `ArgumentCountError`
* `ValueError`
* `UnhandledMatchError`
* `FiberError`
* `RequestParseBodyException`
* `Exception`
...

-- [PHP Reference](https://www.php.net/manual/en/language.errors.php7.php#language.errors.php7.hierarchy)

[▵ Up](#errors)
[⌂ Home](../../../../README.md)
[▲ Previous: Traits](../../classes_interfaces_traits/traits/traits.md)
[▼ Next: Exceptions](../exceptions/exceptions.md)
