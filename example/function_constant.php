<?php

define("NUMBER", 10);
const TEXT = "pattern";

print("Number: " . constant('NUMBER') . PHP_EOL);
print("Text: " . constant('TEXT') . PHP_EOL);

class SomeClass
{
    const CONTENT = 'Lorem ipsum dolor sit amet.';
}

print("Content: " . constant('SomeClass::CONTENT') . PHP_EOL);

interface SomeInterface
{
    const QUANTITY = 1024;
}

print("Quantity: " . constant('SomeInterface::QUANTITY') . PHP_EOL);

trait SomeTrait
{
    const LEVEL = 15.5;
}

// print("Level: " . constant('SomeTrait::LEVEL') . PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

print("Level: " . constant('SomeTraitUsingClass::LEVEL') . PHP_EOL);

enum Colors
{
    case Orange;
}

var_dump(constant('Colors::Orange'));
