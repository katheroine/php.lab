<?php

class SomeClass
{
    public function __construct(
        public string $someProperty = '' {
            set(string $property) {
                $this->someProperty = '<' . $property . '>';
            }
            get {
                return trim($this->someProperty, '<>');
            }
        }
    ) {
    }
}

$someObject = new SomeClass('mango');

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);
