<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public function __invoke(...$callableArguments): int
    {
        print(
            "Magic method __invoke\n\n"
            . "Arguments of the callable:\n\n"
        );
        var_dump($callableArguments);
        print(PHP_EOL);

        foreach ($callableArguments as $argument) {
            print(
                'Argument type: ' . gettype($argument) . PHP_EOL
                . 'Exported: ' . var_export($argument, true) . PHP_EOL
                . PHP_EOL
            );
        }

        return count($callableArguments);
    }
}

$someObject = new SomeClass();

$result = $someObject(4, "hello", [2, 3]);

print($result . PHP_EOL . PHP_EOL);
