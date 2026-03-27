<?php

class SomeClass
{
    public $publicProperty = 'public';
    public static $staticProperty = 'static';
    public readonly string $readonlyProperty;
    final public $finalProperty = 'final';

    public function __construct()
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
