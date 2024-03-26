<?php

class SomeClass
{
    public function someMethod(string $someArgument)
    {
        print($someArgument . PHP_EOL);
    }
}

class OtherClass extends SomeClass
{
    public function someMethod(string $someArgument = "Hi, there!")
    {
        print($someArgument . PHP_EOL);
    }
}

$otherObject = new OtherClass();
$otherObject->someMethod();

class AnotherClass extends SomeClass
{
    public function someMethod(string $someArgumentRenamed, int $anotherArgument = 3)
    {
        foreach (range(1, $anotherArgument) as $i) {
            print($someArgumentRenamed . PHP_EOL);
        }
    }
}

$anotherObject = new AnotherClass();
$anotherObject->someMethod("Hello, world!");
