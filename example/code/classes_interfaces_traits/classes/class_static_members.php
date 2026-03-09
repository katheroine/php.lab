<?php

class SomeClass
{
    public static $someStaticProperty = 'lemon';

    public static function someStaticMethod()
    {
        return 'blackberry';
    }
}

print('Statically accessed static property value: ' . SomeClass::$someStaticProperty . PHP_EOL);
print('Statically called static method result: ' . SomeClass::someStaticMethod() . PHP_EOL);

$someObject = new SomeClass();

print('Dynamically called static method result: ' . $someObject->someStaticMethod() . PHP_EOL);
