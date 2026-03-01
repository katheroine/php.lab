<?php

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $privateProperty = 'hello';

    public function setProtectedProperty($protectedProperty)
    {
        $this->protectedProperty = $protectedProperty;
    }

    public function setPrivateProperty($privateProperty)
    {
        $this->privateProperty = $privateProperty;
    }
}

$someObject = new SomeClass();

print("Some object:\n\n");
var_dump($someObject);
print(PHP_EOL);

$someObject->publicProperty = 2.5;
$someObject->setProtectedProperty(32);
$someObject->setPrivateProperty('hi');

var_dump($someObject);
print(PHP_EOL);

$someReference = $someObject;

$someReference->publicProperty = 100;
$someReference->setProtectedProperty(300);
$someReference->setPrivateProperty('welcome');

var_dump($someObject);
print(PHP_EOL);
