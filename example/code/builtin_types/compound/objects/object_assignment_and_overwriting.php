<?php

class SomeClass
{
    function __construct(
        public $publicProperty = null,
        protected $protectedProperty = 15.5,
        private $privateProperty = 'hello'
    ) {
    }
}

$someObject = new SomeClass();
print("Initialised and assigned:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject = new SomeClass(16, 14.2, 'welcome');
print("Overwritten:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->publicProperty = 'hello';
print("After overwriting a property:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->dynamicProperty = 10;
print("After dynamically added a property:\n\n");
print_r($someObject);
print(PHP_EOL);
