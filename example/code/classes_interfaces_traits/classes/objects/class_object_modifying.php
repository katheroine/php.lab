<?php

class SomeClass
{
    public function __construct(
        public mixed $publicProperty,
        protected string $protectedProperty,
        private string $privateProperty = 'nothing',
    ) {
    }

    public function setProtectedProperty(string $protectedProperty)
    {
        $this->protectedProperty = 'base ' . $protectedProperty;
    }

    public function setPrivateProperty(string $privateProperty)
    {
        $this->privateProperty = 'base ' . $privateProperty;
    }
}

class OtherClass extends SomeClass
{
    public function setProtectedProperty(int|string $protectedProperty)
    {
        $this->protectedProperty = 'derived ' . $protectedProperty;
    }
}

$someObject = new SomeClass('some value', 15.5);

print("Some object:\n\n");

print_r($someObject);
print(PHP_EOL);

$someObject->publicProperty = 'orange';
$someObject->setProtectedProperty('tangerine');
$someObject->setPrivateProperty(1024);

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = '16';
$someObject->otherDynamicProperty = 'coffee';

print_r($someObject);
print(PHP_EOL);

$otherObject = new OtherClass('other value', 10);

print("Other object:\n\n");

print_r($otherObject);
print(PHP_EOL);

$otherObject->publicProperty = 100;
$otherObject->setProtectedProperty(200);

print_r($otherObject);
print(PHP_EOL);
