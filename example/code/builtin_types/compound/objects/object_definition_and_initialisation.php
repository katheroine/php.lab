<?php

$objectFromEmptyArray = (object)[];
print("Defined from empty array:\n\n");
print_r($objectFromEmptyArray);
print(PHP_EOL);

$objectFromIndexedArray = (object)[null, true, 3, 'orange'];
print("Defined from indexed array:\n\n");
print_r($objectFromIndexedArray);
print(PHP_EOL);

$objectFromAssociativeArray = (object)[
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];
print("Defined from associative array:\n\n");
print_r($objectFromAssociativeArray);
print(PHP_EOL);

$objectFromStdClass = new stdClass();
print("Defined from stdClass class:\n\n");
print_r($objectFromStdClass);
print(PHP_EOL);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty;
    private $privateProperty;
}

$uninitialisedObjectFromClass = new SomeClass();
print("Not initialised, defined from class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);

class OtherClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty
    ) {
    }
}

$initialisedObjectFromClass = new OtherClass(16, 14.2, 'welcome');
print("Initialised, defined from class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);
