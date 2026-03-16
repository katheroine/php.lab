<?php

class SomeClass
{
    public $somePublicProperty = 'public';
    protected string $someProtectedProperty = 'protected';

    public function __construct(
        private string $somePrivateProperty = 'private',
        public readonly string $someReadonlyProperty = 'readonly',
    ) {
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'banana',
    'mango',
);
$otherObject->somePublicProperty = 'lemon';

var_dump($otherObject);
print(PHP_EOL);
