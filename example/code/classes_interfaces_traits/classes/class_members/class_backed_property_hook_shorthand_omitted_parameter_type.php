<?php

class SomeClass
{
    public string $someProperty = '' {
        set {
            $this->someProperty = '<' . $value . '>';
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);
