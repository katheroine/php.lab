<?php

class SomeClass
{
    public $someVariable;

    public static function constructByStatic()
    {
        return new static;
    }

    public static function constructBySelf()
    {
        return new self;
    }
}

$new = new SomeClass();
$new->someVariable = 1024;
$object = new $new;
$static = SomeClass::constructByStatic();
$self = SomeClass::constructBySelf();

print(get_class($new) . PHP_EOL);
print(get_class($object) . PHP_EOL);
print(get_class($static) . PHP_EOL);
print(get_class($self) . PHP_EOL);

print(PHP_EOL);

var_dump($new == $object);
var_dump($new === $object);
