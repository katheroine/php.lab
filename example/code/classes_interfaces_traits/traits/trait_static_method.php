<?php

trait SomeTrait
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }
}

class SomeClass
{
    use SomeTrait;

    public static function otherStaticMethod(): void
    {
        print(self::someStaticMethod() . PHP_EOL);
    }

    public function otherMethod(): void
    {
        print(
            self::someStaticMethod() . PHP_EOL
            . $this::someStaticMethod() . PHP_EOL
            . $this->someStaticMethod() . PHP_EOL
        );
    }
}

print(SomeTrait::someStaticMethod() . PHP_EOL);
print(SomeClass::someStaticMethod() . PHP_EOL);
$someObject = new SomeClass();
print($someObject->someStaticMethod() . PHP_EOL);
$someObject::otherStaticMethod();
$someObject->otherMethod();
