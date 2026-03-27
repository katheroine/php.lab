<?php

class SomeClass
{
    public const SOME_CONSTANT = 'pear';

    public static $someStaticProperty = 'lemon';

    public static function someStaticMethod()
    {
        return 'blackberry';
    }
}

$someObject = new SomeClass();

print('Statically accessed constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Statically accessed static property value: ' . SomeClass::$someStaticProperty . PHP_EOL);
print('Statically called static method result: ' . SomeClass::someStaticMethod() . PHP_EOL);
print('Dynamically called static method result: ' . $someObject->someStaticMethod() . PHP_EOL);
