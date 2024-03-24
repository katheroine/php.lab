<?php

class SomeClass
{
    public const SOME_CLASS_CONSTANT = 'lalala';
    public static int $someClassVariable = 0;
    public string $someObjectVariable = 'hello';

    public static function someClassFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            // . $this->someObjectVariable . PHP_EOL
            . PHP_EOL
        );

        self::$someClassVariable++;
    }

    public function someObjectFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            // . $this->someClassVariable . PHP_EOL
            . $this->someObjectVariable . PHP_EOL
            . PHP_EOL
        );
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

SomeClass::$someClassVariable = 256;
// $someObject->someClassVariable = 128;
$someObject->someObjectVariable = 'hi';

SomeClass::someClassFunction();
SomeClass::someClassFunction();
SomeClass::someClassFunction();

class SomeSubclass extends SomeClass
{
    public function someObjectFunction(): void
    {
        print(parent::SOME_CLASS_CONSTANT . PHP_EOL
            . self::SOME_CLASS_CONSTANT . PHP_EOL
            . parent::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            . $this->someObjectVariable . PHP_EOL
            . PHP_EOL
        );
    }
}

SomeSubclass::someClassFunction();

$someSubobject = new SomeSubclass();
$someSubobject->someObjectFunction();
