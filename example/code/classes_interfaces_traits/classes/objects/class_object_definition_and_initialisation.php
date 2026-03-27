<?php

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
    public function __construct(
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
