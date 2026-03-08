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

function receivingFunction(object $objectArgument)
{
    print("As function argument\n");
    var_dump($objectArgument);
    print(PHP_EOL);
}

function returningFunction()
{
    return new AnotherClass();
}

$someObject = new SomeClass();

print("As a variable\n");
var_dump($someObject);
print(PHP_EOL);

receivingFunction(new OtherClass);

print("As a function result\n");
var_dump(returningFunction());
print(PHP_EOL);
