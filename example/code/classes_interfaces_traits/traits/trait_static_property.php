<?php

trait SomeTrait
{
    public static string $someStaticProperty = 'static property';
}

class SomeClass
{
    use SomeTrait;

    public static function someStaticMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }

    public function someMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }
}

print(SomeTrait::$someStaticProperty . PHP_EOL);
print(SomeClass::$someStaticProperty . PHP_EOL);
$someObject = new SomeClass();
$someObject->someMethod();
