<?php

class SomeClass
{
    public string $someProperty = '' {
        set => $this->someProperty = '<' . $value . '>';
        get => trim($this->someProperty, '<>');
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);
