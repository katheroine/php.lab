<?php

// "ArithmeticError is thrown when an error occurs while performing mathematical operations.
// These errors include attempting to perform a bitshift by a negative amount,
// and any call to intdiv() that would result in a value outside the possible bounds of an int."
// -- https://www.php.net/manual/en/class.arithmeticerror.php

try {
    8 >> -1;
} catch (ArithmeticError $exception) { // extends Error
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
