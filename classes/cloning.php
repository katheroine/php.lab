<?php

class SomeClass
{
    public string $someVariable = 'hello';
}

$someObject = new SomeClass();
$anotherObject = new SomeClass();

var_dump($someObject === $someObject);
var_dump($someObject === $anotherObject);

print(PHP_EOL);

$assignedObject = $someObject;
$someObject->someVariable = 'hi';

var_dump($someObject === $assignedObject);
print($assignedObject->someVariable . PHP_EOL);

print(PHP_EOL);

$someObject->someVariable = 'welcome';
$clonedObject = clone $someObject;

var_dump($someObject === $clonedObject);
print($clonedObject->someVariable . PHP_EOL);

print(PHP_EOL);
