<?php
declare(strict_types=1);

// "A TypeError may be thrown when:
// - The value being set for a class property does not match the property's corresponding declared type,
// - The argument type being passed to a function does not match its corresponding declared parameter type,
// - A value being returned from a function does not match the declared function return type."
// -- https://www.php.net/manual/en/class.typeerror.php

function someFunction(string $someArgument): void
{
    print("Some function with argument {$someArgument}\n");
}

try {
    someFunction(10);
} catch (TypeError $exception) {
    print('As string: ' . $exception . PHP_EOL . PHP_EOL);
    print('Message: ' . $exception->getMessage() . PHP_EOL . PHP_EOL);
    print('Code: ' . $exception->getCode() . PHP_EOL . PHP_EOL);
    print('File: ' . $exception->getFile() . PHP_EOL . PHP_EOL);
    print('Line: ' . $exception-> getLine() . PHP_EOL . PHP_EOL);
    print('Trace as string: ' . $exception->getTraceAsString() . PHP_EOL . PHP_EOL);
    print("Trace:\n");
    print_r($exception->getTrace());
    print(PHP_EOL);
    print('Previous: ' . $exception->getPrevious() . PHP_EOL . PHP_EOL);
}
