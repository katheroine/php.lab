<?php

class SomeClass
{
    public $someProperty = 'lemon';

    public static function someStaticMethod()
    {
        print("Inside static method.\n\n");
    }

    public function someMethod()
    {
        print("Inside method:\n\n");
        print('Property value: ' . $this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();

print("Outside class:\n\n");
print('Property value: ' . $someObject->someProperty . PHP_EOL . PHP_EOL);
print("Static method call:\n\n");
$someObject->someStaticMethod();
print("Method call:\n\n");
$someObject->someMethod();
