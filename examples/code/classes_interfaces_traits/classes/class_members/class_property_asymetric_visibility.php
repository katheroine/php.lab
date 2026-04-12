<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    protected(set) string $someProperty = 'protected(set)';
    protected private(set) string $otherProperty = 'protected private(set)';

    function someSettingMethod()
    {
        print("# In the base class\n\n");
        $this->someProperty .= ' - modified in base class';
        $this->otherProperty .= ' - modified in base class';
    }

    function someGettingMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherSettingMethod()
    {
        print("# In the derived class\n\n");
        $this->someProperty .= ' - modified in derived class';
    }

    function otherGettingMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someGettingMethod();
$someObject->someSettingMethod();
var_dump($someObject);
print(PHP_EOL);

$otherObject = new OtherClass();
$otherObject->otherSettingMethod();
$otherObject->otherGettingMethod();
var_dump($otherObject);
print(PHP_EOL);

print(
    "# From the outside:\n\n"
    . $someObject->someProperty . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);
