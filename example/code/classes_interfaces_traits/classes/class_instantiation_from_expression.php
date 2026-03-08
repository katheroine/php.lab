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

function giveClassName(): string
{
    return 'OtherClass';
}

$someObject = new ('Some' . 'Class')();

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$otherObject = new (giveClassName())();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new ('An' . giveClassName())();

print("Another object\n");
var_dump($anotherObject);
print(PHP_EOL);
