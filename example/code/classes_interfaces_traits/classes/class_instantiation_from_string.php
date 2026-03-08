<?php

class SomeClass
{
}

class OtherClass
{
}

class AnotherClass
{
}

const CLASS_NAME = 'SomeClass';
$someObject = new (CLASS_NAME)();

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$className = 'OtherClass';
$otherObject = new $className();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new ('An' . $className)();

print("Another object\n");
var_dump($anotherObject);
print(PHP_EOL);
