<?php

class SomeClass
{
    public $publicProperty = 'public';
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
    $someObject->publicProperty . PHP_EOL
    . SomeClass::$staticProperty . PHP_EOL
    . $someObject->readonlyProperty . PHP_EOL
    . $someObject->finalProperty . PHP_EOL
);
