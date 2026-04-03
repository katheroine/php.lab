<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "A ClosedGeneratorException is thrown when trying to retrieve a value from a closed Generator."
// -- https://www.php.net/manual/en/class.closedgeneratorexception.php

function someGenerator(int $start, int $stop): Generator {
    for ($number = $start; $number <= $stop; $number++) {
        yield $number;
    }
}

try {
    $generator = someGenerator(1, 3);
    $generator->throw(new ClosedGeneratorException());

} catch (ClosedGeneratorException $exception) { // extends Exception
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
