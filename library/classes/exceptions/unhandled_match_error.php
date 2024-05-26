<?php

// "An UnhandledMatchError is thrown when the subject passed to a match expression
// is not handled by any arm of the match expression."
// -- https://www.php.net/manual/en/class.unhandledmatcherror.php

try {
    match(null) {
    };
} catch (UnhandledMatchError $exception) { // extends Error
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
