<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private const array ACTIONS = [
        'adding' => 'array_sum',
        'multipling' => 'array_product',
    ];

    public static function __callStatic(string $methodName, mixed $methodArguments): mixed
    {
        print(
            "Magic method __callStatic\n\n"
            . "Method name: {$methodName}\n\n"
            . "Method arguments:\n"
        );
        var_dump($methodArguments);
        print(PHP_EOL);

        if (! isset(static::ACTIONS[$methodName])) {
            return null;
        }

        return static::ACTIONS[$methodName]($methodArguments);
    }
}

$result = SomeClass::adding(1, 2, 3);

print($result . PHP_EOL . PHP_EOL);
