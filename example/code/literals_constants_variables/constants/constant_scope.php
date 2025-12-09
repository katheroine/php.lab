<?php

define("WEATHER", "windy");
const COLOR = "orange";
const NUMBER = 3;

printf("GLOBAL SCOPE: Weather: %s\n", WEATHER);
printf("GLOBAL SCOPE: Color: %s\n", COLOR);
printf("GLOBAL SCOPE: Number: %s\n", NUMBER);
print(PHP_EOL);

function someFunction()
{
    define("FLOWER", "rose");
    // const TREE = "pine";
    // PHP Parse error:  syntax error, unexpected token "const"

    printf("FUNCTION SCOPE: Weather: %s\n", WEATHER);
    printf("FUNCTION SCOPE: Color: %s\n", COLOR);
    printf("FUNCTION SCOPE: Number: %s\n", NUMBER);
    printf("FUNCTION SCOPE: Flower: %s\n", FLOWER);
    print(PHP_EOL);
}

someFunction();

printf("GLOBAL SCOPE: Flower: %s\n", FLOWER);
print(PHP_EOL);

class SomeClass
{
    const VEGETABLE = 'pumpkin';

    static function someClassFunction()
    {
        define('UTENSIL', 'cup');

        printf("CLASS SCOPE: Weather: %s\n", WEATHER);
        printf("CLASS SCOPE: Color: %s\n", COLOR);
        printf("CLASS SCOPE: Number: %s\n", NUMBER);
        // printf("CLASS SCOPE: Vegetable: %s\n", VEGETABLE);
        printf("CLASS SCOPE: Vegetable: %s\n", self::VEGETABLE);
        printf("CLASS SCOPE: Utensil: %s\n", UTENSIL);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        define('FURNITURE', 'armchair');

        printf("OBJECT SCOPE: Weather: %s\n", WEATHER);
        printf("OBJECT SCOPE: Color: %s\n", COLOR);
        printf("OBJECT SCOPE: Number: %s\n", NUMBER);
        printf("OBJECT SCOPE: Vegetable: %s\n", self::VEGETABLE);
        // printf("OBJECT SCOPE: Vegetable: %s\n", $this->VEGETABLE);
        printf("OBJECT SCOPE: Furniture: %s\n", FURNITURE);
        print(PHP_EOL);
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

printf("GLOBAL SCOPE: Vegetable: %s\n", SomeClass::VEGETABLE);
printf("GLOBAL SCOPE: Utensil: %s\n", UTENSIL);
printf("GLOBAL SCOPE: Furniture: %s\n", FURNITURE);
print(PHP_EOL);

interface SomeInterface
{
    const TREE = 'pine';
}

// printf("Tree defined? %s\n", defined('SomeInterface::TREE'));
// print(PHP_EOL);

printf("GLOBAL SCOPE: Tree: %s\n", SomeInterface::TREE);
print(PHP_EOL);

trait SomeTrait
{
    const FRUIT = 'orange';

    static function someTraitFunction()
    {
        define('TOOL', 'axe');

        printf("TRAIT SCOPE: Weather: %s\n", WEATHER);
        printf("TRAIT SCOPE: Color: %s\n", COLOR);
        printf("TRAIT SCOPE: Number: %s\n", NUMBER);
        // printf("TRAIT SCOPE: Fruit: %s\n", FRUIT);
        // printf("TRAIT SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("TRAIT SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("TRAIT SCOPE: Tool: %s\n", TOOL);
        print(PHP_EOL);
    }

    static function someClassFunction()
    {
        define('DEVICE', 'calculator');

        printf("CLASS SCOPE: Weather: %s\n", WEATHER);
        printf("CLASS SCOPE: Color: %s\n", COLOR);
        printf("CLASS SCOPE: Number: %s\n", NUMBER);
        // printf("CLASS SCOPE: Fruit: %s\n", FRUIT);
        printf("CLASS SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("CLASS SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("CLASS SCOPE: Device: %s\n", DEVICE);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        define('DECOR', 'vase');

        printf("OBJECT SCOPE: Weather: %s\n", WEATHER);
        printf("OBJECT SCOPE: Color: %s\n", COLOR);
        printf("OBJECT SCOPE: Number: %s\n", NUMBER);
        // printf("OBJECT SCOPE: Fruit: %s\n", FRUIT);
        // printf("OBJECT SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("OBJECT SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("OBJECT SCOPE: Decor: %s\n", DECOR);
        print(PHP_EOL);
    }
}

SomeTrait::someTraitFunction();

// printf("GLOBAL SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
printf("GLOBAL SCOPE: Tool: %s\n", TOOL);
// printf("GLOBAL SCOPE: Decor: %s\n", DECOR);
print(PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

SomeTraitUsingClass::someClassFunction();

$some_trait_using_object = new SomeTraitUsingClass();
$some_trait_using_object->someObjectFunction();

printf("GLOBAL SCOPE: Fruit: %s\n", SomeTraitUsingClass::FRUIT);
printf("GLOBAL SCOPE: Tool: %s\n", TOOL);
printf("GLOBAL SCOPE: Device: %s\n", DEVICE);
printf("GLOBAL SCOPE: Decor: %s\n", DECOR);
print(PHP_EOL);
