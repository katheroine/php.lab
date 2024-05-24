<?php

// "Exception is the base class for all user exceptions."
// -- https://www.php.net/manual/en/class.exception.php

function someFunction(): void
{
    throw new Exception(
        message: 'Here occured some exception.',
        code: 1024,
        previous: null
    ); // implements Throwable
}

try {
    someFunction();
} catch (Exception $exception) {
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
