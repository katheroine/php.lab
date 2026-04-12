<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public OtherClass $someInnerObject;
    public OtherClass $otherInnerObject;

    public function __construct()
    {
        $this->someInnerObject = new OtherClass();
        $this->otherInnerObject = new OtherClass();
    }

    public function __clone(): void
    {
        print(
            "Magic method __clone\n\n"
        );

        $this->someInnerObject = new OtherClass();
    }
}

class OtherClass
{
    public string $someProperty = 'original';
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = clone $someObject;

var_dump($otherObject);
print(PHP_EOL);

$someObject->someInnerObject->someProperty = 'modified';
$someObject->otherInnerObject->someProperty = 'modified';

var_dump($otherObject);
print(PHP_EOL);
