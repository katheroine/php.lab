<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private array $data = [];

    public function __set(string $propertyName, mixed $propertyValue): void
    {
        print(
            "Magic method __set\n\n"
            . "Argument name: {$propertyName}\n"
            . "Argument value: {$propertyValue}\n\n"
        );

        $this->data[$propertyName] = $propertyValue;
    }
}

$someObject = new SomeClass();
$someObject->variable = "hello";

var_dump($someObject);
print(PHP_EOL);
