<?php

$objectFromIndexedArray = (object)[null, true, 3, 'orange'];
$objectFromAssociativeArray = (object)[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];
$objectFromStdClass = new stdClass();

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 1024
    ) {
    }
}

$uninitialisedObjectFromClass = new SomeClass('hello', 15.5);

print("From indexed array:\n\n");
print_r($objectFromIndexedArray);
print(PHP_EOL);

print("From associative array:\n\n");
print_r($objectFromAssociativeArray);
print(PHP_EOL);

print("From stdClass class:\n\n");
print_r($objectFromStdClass);
print(PHP_EOL);

print("From defined class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);
