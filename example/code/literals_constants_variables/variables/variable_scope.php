<?php

$weather = 'windy';
$color = "orange";
$number = 3;
$level = 15.5;

printf("GLOBAL SCOPE: Weather: %s\n", $weather);
printf("GLOBAL SCOPE: Color: %s\n", $color);
printf("GLOBAL SCOPE: Number: %s\n", $number);
printf("GLOBAL SCOPE: Level: %s\n", $level);
print(PHP_EOL);

function someFunction()
{
    $flower = 'rose';
    static $degree = 10;

    // printf("FUNCTION SCOPE: Weather: %s\n", $weather);
    printf("FUNCTION SCOPE: Flower: %s\n", $flower);
    printf("FUNCTION SCOPE: Degree: %s\n", $degree);
    print(PHP_EOL);
}

someFunction();

// printf("GLOBAL SCOPE: Flower: %s\n", $flower);
// print(PHP_EOL);

class SomeClass
{
    public $vegetable = 'pumpkin';
    public static $grain = 'wheat';

    static function someClassFunction()
    {
        $utensil = 'cup';

        printf("CLASS SCOPE: Grain: %s\n", self::$grain);
        // printf("OBJECT SCOPE: Vegetable: %s\n", $this->vegetable);
        printf("CLASS SCOPE: Utensil: %s\n", $utensil);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        $furniture = 'armchair';

        printf("OBJECT SCOPE: Vegetable: %s\n", $this->vegetable);
        printf("OBJECT SCOPE: Grain: %s\n", self::$grain);
        // printf("OBJECT SCOPE: Grain: %s\n", $this->grain);
        printf("OBJECT SCOPE: Furniture: %s\n", $furniture);
        print(PHP_EOL);
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

printf("GLOBAL SCOPE: Grain: %s\n", SomeClass::$grain);
print(PHP_EOL);

trait SomeTrait
{
    public $fruit = 'orange';
    public static $plant = 'polypodium';

    static function someTraitFunction()
    {
        $tool = 'axe';

        // printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("TRAIT SCOPE: Plant: %s\n", self::$plant);
        printf("TRAIT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("TRAIT SCOPE: Tool: %s\n", $tool);
        print(PHP_EOL);
    }

    static function someClassFunction()
    {
        $device = 'calculator';

        // printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("CLASS SCOPE: Plant: %s\n", self::$plant);
        printf("CLASS SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("CLASS SCOPE: Device: %s\n", $device);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        $decor = 'vase';

        printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("OBJECT SCOPE: Plant: %s\n", self::$plant);
        printf("OBJECT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("OBJECT SCOPE: Decor: %s\n", $decor);
        print(PHP_EOL);
    }
}

SomeTrait::someTraitFunction();

printf("GLOBAL SCOPE: Plant: %s\n", SomeTrait::$plant);
print(PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

SomeTraitUsingClass::someClassFunction();

$some_trait_using_object = new SomeTraitUsingClass();
$some_trait_using_object->someObjectFunction();

printf("GLOBAL SCOPE: Plant: %s\n", SomeTraitUsingClass::$plant);
print(PHP_EOL);
