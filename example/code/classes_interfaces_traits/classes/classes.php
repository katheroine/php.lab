<?php

class SomeClass
{
    public const SOME_CLASS_CONSTANT = 'lalala';
    public static int $someClassVariable = 1024;
    public string $someObjectVariable = 'hello';
    public readonly float $someUnchengeableVariable;

    public function __construct()
    {
        $this->someUnchengeableVariable = 1.5;
    }

    public static function someClassFunction(): void
    {
        print(
            SomeClass::SOME_CLASS_CONSTANT . PHP_EOL
            . self::SOME_CLASS_CONSTANT . PHP_EOL
            . SomeClass::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            // . $this->someObjectVariable . PHP_EOL
            . PHP_EOL
        );
    }

    public function someObjectFunction(): void
    {
        print(
            SomeClass::SOME_CLASS_CONSTANT . PHP_EOL
            . self::SOME_CLASS_CONSTANT . PHP_EOL
            . SomeClass::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            // . $this->someClassVariable . PHP_EOL
            . $this->someObjectVariable . PHP_EOL
            . $this->someUnchengeableVariable . PHP_EOL
            . PHP_EOL
        );

        // $this->someUnchengeableVariable = 512;
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

SomeClass::$someClassVariable = 256;
// $someObject->someClassVariable = 128;
$someObject->someObjectVariable = 'hi';
// $someObject->someUnchengeableVariable = 2;

$someObject->someObjectFunction();
