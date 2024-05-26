<?php

// "A ValueError is thrown when the type of an argument is correct but the value of it is incorrect.
// For example, passing a negative integer when the function expects a positive one,
// or passing an empty string/array when the function expects it to not be empty."
// -- https://www.php.net/manual/en/class.valueerror.php

try {
    json_decode('{}', true, -1);
} catch (ValueError $exception) { // extends Error
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
