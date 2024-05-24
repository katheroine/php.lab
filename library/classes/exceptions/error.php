<?php

// "Error is the base class for all internal PHP errors."
// -- https://www.php.net/manual/en/class.error.php

function someFunction(): void
{
    throw new Error(
        message: 'Here occured some error.',
        code: 2048,
        previous: null
    ); // implements Throwable
}

try {
    someFunction();
} catch (Error $exception) {
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
