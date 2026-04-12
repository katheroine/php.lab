<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $somePublicProperty = 'apple';
    public string $otherPublicProperty = 'orange';
    public string $anotherPublicProperty = 'banana';
    protected string $someProtectedProperty = 'pear';
    private string $somePrivateProperty = 'peach';

    public function iterateWithValues()
    {
        foreach ($this as $value) {
            print("{$value}\n");
        }
    }

    public function iterateWithKeysAndValues()
    {
        foreach ($this as $key => $value) {
            print("{$key}: {$value}\n");
        }
    }
}

class OtherClass extends SomeClass
{
    public function iterateWithValues()
    {
        foreach ($this as $value) {
            print("{$value}\n");
        }
    }

    public function iterateWithKeysAndValues()
    {
        foreach ($this as $key => $value) {
            print("{$key}: {$value}\n");
        }
    }
}

$someObject = new SomeClass();

print(
    "# SomeClass:\n\n"
    . "from outside:\n\n"
);

foreach ($someObject as $value) {
    print("{$value}\n");
}
print(PHP_EOL);

foreach ($someObject as $key => $value) {
    print("{$key}: {$value}\n");
}
print(PHP_EOL);

print("from inside:\n\n");

$someObject->iterateWithValues();
print(PHP_EOL);

$someObject->iterateWithKeysAndValues();
print(PHP_EOL);

$otherObject = new OtherClass();

print(
    "# OtherClass:\n\n"
    . "from outside:\n\n"
);

foreach ($otherObject as $value) {
    print("{$value}\n");
}
print(PHP_EOL);

foreach ($otherObject as $key => $value) {
    print("{$key}: {$value}\n");
}
print(PHP_EOL);

print("from inside:\n\n");

$otherObject->iterateWithValues();
print(PHP_EOL);

$otherObject->iterateWithKeysAndValues();
print(PHP_EOL);
