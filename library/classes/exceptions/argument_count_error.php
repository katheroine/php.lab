<?php

// "ArgumentCountError is thrown when too few arguments are passed to a user-defined function or method.
// This error is also thrown when too many arguments are passed to a non-variadic built-in function."
// -- https://www.php.net/manual/en/class.argumentcounterror.php

function someFunction(string $someArgument): void
{
    print("Some function with argument {$someArgument}\n");
}

try {
    someFunction();
} catch (ArgumentCountError $exception) { // extends TypeError
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
