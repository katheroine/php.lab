<?php

$weather = 'windy';
$color = "orange";
$number = 3;
$level = 15.5;

printf("Weather defined? %s\n", isset($weather));
printf("Color defined? %s\n", isset($color));
printf("Number defined? %s\n", isset($number));
printf("Level defined? %s\n", isset($level));
printf("Item defined? %s\n", isset($item));
print(PHP_EOL);

printf("Weather: %s\n", $weather);
printf("Color: %s\n", $color);
printf("Number: %s\n", $number);
printf("Level: %s\n", $level);
// printf("Item: %s\n", $item);
print(PHP_EOL);

$variables = get_defined_vars();

printf("Weather: %s\n", $variables['weather']);
printf("Color: %s\n", $variables['color']);
printf("Number: %s\n", $variables['number']);
printf("Level: %s\n", $variables['level']);
// printf("Item: %s\n", $variables['item']);
print(PHP_EOL);

printf("GLOBAL SCOPE: Weather: %s\n", $weather);
printf("GLOBAL SCOPE: Color: %s\n", $color);
printf("GLOBAL SCOPE: Number: %s\n", $number);
printf("GLOBAL SCOPE: Level: %s\n", $level);
print(PHP_EOL);

function some_function()
{
    $flower = 'rose';
    static $step = 0;

    // printf("FUNCTION SCOPE: Weather: %s\n", $weather);
    printf("FUNCTION SCOPE: Flower: %s\n", $flower);
    printf("FUNCTION SCOPE: Step: %s\n", $step);
    print(PHP_EOL);

    $step++;
}

some_function();
some_function();
some_function();

printf("Flower defined? %s\n", isset($flower));
print(PHP_EOL);

// printf("GLOBAL SCOPE: Flower: %s\n", $flower);
// print(PHP_EOL);

class SomeClass
{
    public $vegetable = 'pumpkin';
    public static $grain = 'wheat';

    static function some_class_function()
    {
        $utensil = 'cup';

        printf("CLASS SCOPE: Grain: %s\n", self::$grain);
        printf("CLASS SCOPE: Utensil: %s\n", $utensil);
        print(PHP_EOL);
    }

    function some_object_function()
    {
        $furniture = 'armchair';

        printf("OBJECT SCOPE: Vegetable: %s\n", $this->vegetable);
        printf("OBJECT SCOPE: Grain: %s\n", self::$grain);
        printf("OBJECT SCOPE: Furniture: %s\n", $furniture);
        print(PHP_EOL);
    }
}

SomeClass::some_class_function();

$someObject = new SomeClass();
$someObject->some_object_function();

printf("Grain defined? %s\n", isset(SomeClass::$grain));
print(PHP_EOL);

printf("GLOBAL SCOPE: Grain: %s\n", SomeClass::$grain);
print(PHP_EOL);

trait SomeTrait
{
    public $fruit = 'orange';
    public static $plant = 'polypodium';

    static function some_trait_function()
    {
        $tool = 'axe';

        printf("TRAIT SCOPE: Plant: %s\n", self::$plant);
        printf("TRAIT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("TRAIT SCOPE: Tool: %s\n", $tool);
        print(PHP_EOL);
    }

    static function some_class_function()
    {
        $device = 'calculator';

        printf("CLASS SCOPE: Plant: %s\n", self::$plant);
        printf("CLASS SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("CLASS SCOPE: Device: %s\n", $device);
        print(PHP_EOL);
    }

    function some_object_function()
    {
        $decor = 'vase';

        printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("OBJECT SCOPE: Plant: %s\n", self::$plant);
        printf("OBJECT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("OBJECT SCOPE: Decor: %s\n", $decor);
        print(PHP_EOL);
    }
}

SomeTrait::some_trait_function();

printf("Plant defined? %s\n", isset(SomeTrait::$plant));
print(PHP_EOL);

printf("GLOBAL SCOPE: Plant: %s\n", SomeTrait::$plant);
print(PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

SomeTraitUsingClass::some_class_function();

$some_trait_using_object = new SomeTraitUsingClass();
$some_trait_using_object->some_object_function();

printf("Plant defined? %s\n", isset(SomeTraitUsingClass::$plant));
print(PHP_EOL);

printf("GLOBAL SCOPE: Plant: %s\n", SomeTraitUsingClass::$plant);
print(PHP_EOL);
