<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private array $actions = [];

    function __construct()
    {
        $this->actions = [
            'adding' => function($values) {
                return array_sum($values);
            },
            'multipling' => function($values) {
                return array_product($values);
            },
        ];
    }

    public function __call(string $methodName, mixed $methodArguments): mixed
    {
        print(
            "Magic method __call\n\n"
            . "Method name: {$methodName}\n\n"
            . "Method arguments:\n"
        );
        var_dump($methodArguments);
        print(PHP_EOL);

        if (! isset($this->actions[$methodName])) {
            return null;
        }

        return $this->actions[$methodName]($methodArguments);
    }
}

$someObject = new SomeClass();

$result = $someObject->adding(1, 2, 3);

print($result . PHP_EOL . PHP_EOL);
