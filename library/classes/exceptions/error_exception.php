<?php

// "An Error Exception."
// -- https://www.php.net/manual/en/class.errorexception.php

function someFunction(): void
{
    throw new ErrorException(
        message: 'Here occured some error exception.',
        code: 512,
        severity: E_NOTICE,
        filename: __FILE__,
        line: 8,
        previous: null
    ); // extends Exception
}

try {
    someFunction();
} catch (ErrorException $exception) {
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
