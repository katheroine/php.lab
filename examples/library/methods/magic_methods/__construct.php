<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public static $instanceQuantity = 0;

    public string $somePublicProperty;
    protected string $someProtectedProperty;
    private string $somePrivateProperty;

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        print(
            "Magic method __construct\n\n"
        );

        self::$instanceQuantity++;

        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

$someObject = new SomeClass();

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'pear',
    'orange',
    'banana'
);

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);
