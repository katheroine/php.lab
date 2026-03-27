<?php

class BaseClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    public static function someStaticMethod()
    {
        print(static::class . '/' . self::class . " static method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print(PHP_EOL);
    }

    public function someMethod()
    {
        print(static::class . '/' . self::class . " method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
        print(PHP_EOL);
    }
}

class DerivedClass extends BaseClass
{
    public const SOME_CONSTANT = 'potato';
    public static $someStaticProperty = 'tomato';
    public $someProperty = 'cucumber';

    public function otherMethod()
    {
        print(static::class . '/' . self::class . " method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
        print(PHP_EOL);
        print('Statically accessed parent constant value (by parent): ' . parent::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed parent static property value (by parent): ' . parent::$someStaticProperty . PHP_EOL);
        print(PHP_EOL);
    }
}

$someObject = new BaseClass();

$someObject->someStaticMethod();
$someObject->someMethod();

$otherObject = new DerivedClass();

$otherObject->someStaticMethod();
$otherObject->someMethod();
$otherObject->otherMethod();
