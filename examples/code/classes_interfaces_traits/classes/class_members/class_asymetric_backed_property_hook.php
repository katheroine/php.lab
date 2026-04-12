<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $someProperty = '' {
        set(string $property) {
            $this->someProperty = '<' . $property . '>';
        }
    }
}

class OtherClass
{
    public int $otherProperty = 0 {
        get {
            return $this->otherProperty + 1;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

$otherObject = new OtherClass();

var_dump($otherObject);
print(PHP_EOL);

$otherObject->otherProperty = 3;

var_dump($otherObject);
print(PHP_EOL);

print($otherObject->otherProperty . PHP_EOL . PHP_EOL);
