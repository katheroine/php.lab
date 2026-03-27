<?php

class SomeBaseClass
{
    public function someMethod(): string
    {
        return 'basic';
    }
}

final class SomeFinalClass
{
    public function someMethod(): string
    {
        return 'final';
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function someMethod(): string
    {
        return parent::someMethod() . ' -> derived';
    }
}


$someObject = new SomeBaseClass();
print($someObject->someMethod() . PHP_EOL);

$otherObject = new SomeFinalClass();
print($otherObject->someMethod() . PHP_EOL);

$anotherObject = new SomeDerivedClass();
print($anotherObject->someMethod() . PHP_EOL);
