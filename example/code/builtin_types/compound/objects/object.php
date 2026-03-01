<?php

$someObject = (object)[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$otherObject = new SomeClass();

print("Information:\n");
var_dump($someObject);
print('Type: ' . gettype($someObject) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($otherObject);
print('Type: ' . gettype($otherObject) . PHP_EOL . PHP_EOL);
