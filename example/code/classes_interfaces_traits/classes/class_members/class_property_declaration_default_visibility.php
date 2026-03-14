<?php

class SomeClass
{
    static $staticProperty = 'static';
    readonly string $readonlyProperty;
    final $finalProperty = 'final';

    function __construct()
    {
        $this->readonlyProperty = 'readonly';
    }
}

$someObject = new SomeClass();

print(
    SomeClass::$staticProperty . PHP_EOL
    . $someObject->readonlyProperty . PHP_EOL
    . $someObject->finalProperty . PHP_EOL
);
