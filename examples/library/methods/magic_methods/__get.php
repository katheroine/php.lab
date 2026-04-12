<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __get(string $propertyName): mixed
    {
        print(
            "Magic method __get\n\n"
            . "Argument name: {$propertyName}\n\n"
        );

        if (! isset($this->data[$propertyName])) {
            return null;
        }

        return $this->data[$propertyName];
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->platform . PHP_EOL . PHP_EOL);
