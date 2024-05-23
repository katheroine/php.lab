<?php

// "Class used to represent anonymous functions."
// -- https://www.php.net/manual/en/class.closure.php

$someClosure = function (string $argument): int {
    return strlen($argument);
};

print_r($someClosure);

print(PHP_EOL);

print($someClosure('orange') . PHP_EOL . PHP_EOL);

class SomeClass
{
    private static string $someClassProperty = 'rose';
    private int $someObjectProperty = 1024;
}

$someClassClosure = function (string $argument) {
    print(ucfirst(SomeClass::$someClassProperty) . ' ' . $argument . '.' . PHP_EOL);
};

$someObjectClosure = function (int $argument) {
    print($this->someObjectProperty * $argument . PHP_EOL);
};

$someBindingToClass = Closure::bind($someClassClosure, null, 'SomeClass');
$someBindingToObject = Closure::bind($someObjectClosure, new SomeClass(), 'SomeClass');

$someBindingToClass('is my favourite flower');
$someBindingToObject(2);

print(PHP_EOL);

class OtherClass
{
    private static string $someClassProperty = 'orange';
    public int $someObjectProperty = 2048;
}

$otherBindingToObject = $someObjectClosure->bindTo(new OtherClass());

$otherBindingToObject(3);

print(PHP_EOL);

$someObjectClosure->call(new OtherClass(), 4);

print(PHP_EOL);

function someFunction (int $argument) {
    print($this->someObjectProperty + $argument . PHP_EOL);
};

$otherClosure = Closure::fromCallable('someFunction');
$anotherBindingToObject = $otherClosure->bindTo(new OtherClass());

$anotherBindingToObject(5);

print(PHP_EOL);
