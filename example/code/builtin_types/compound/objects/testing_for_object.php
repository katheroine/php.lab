<?php

$someObject = (object)[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];

print('Type of array object: ' . gettype($someObject) . PHP_EOL);
print('Is object? ' . (is_object($someObject) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$otherObject = new SomeClass();

print('Type of class object: ' . gettype($otherObject) . PHP_EOL);
print('Is object? ' . (is_object($otherObject) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is object? ' . (is_object($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
