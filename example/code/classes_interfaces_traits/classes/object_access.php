<?php

class SomeClass
{
    public $someProperty = 'betroot';
}

$someObject = new SomeClass();

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

$someVariable = $someObject;

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

$someReference = &$someObject;

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

$someClone = clone $someObject;

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Change of variable\n\n");

$someVariable->someProperty = 'carrot';

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of reference\n\n");

$someReference->someProperty = 'parsley';

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of clone\n\n");

$someClone->someProperty = 'radish';

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);
