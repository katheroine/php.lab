<?php

class SomeClass
{
    public static function display()
    {
        print("Hello, there!\n");
    }

    public function method()
    {
        self::display();
        static::display();
    }
}

class OtherClass extends SomeClass
{
    public static function display()
    {
        print("Hello, here!\n");
    }
}

$someObject = new OtherClass();
$someObject->method();
