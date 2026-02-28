<?php

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 1024
    ) {
    }
}

$someObject = new SomeClass('hello', 15.5);

print("Some object:\n\n");
var_dump($someObject);
print(PHP_EOL);
print_r($someObject);
print(PHP_EOL);
