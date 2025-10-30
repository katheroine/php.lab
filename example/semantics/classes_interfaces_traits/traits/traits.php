<?php

trait SomeTrait
{
    public const SOME_CLASS_CONSTANT = 'lalala';
    public static int $someClassVariable = 1024;
    public string $someObjectVariable = 'hello';
    public readonly float $someUnchengeableVariable;

    public function __construct()
    {
        $this->someUnchengeableVariable = 1.5;
    }

    public static function someTraitFunction(): void
    {
        print(
            SomeTrait::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            . PHP_EOL
        );
    }

    public static function someClassFunction(): void
    {
        print(
            self::SOME_CLASS_CONSTANT . PHP_EOL
            . SomeTrait::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            . PHP_EOL
        );
    }

    public function someObjectFunction(): void
    {
        print(
            self::SOME_CLASS_CONSTANT . PHP_EOL
            . SomeTrait::$someClassVariable . PHP_EOL
            . self::$someClassVariable . PHP_EOL
            . $this->someObjectVariable . PHP_EOL
            . $this->someUnchengeableVariable . PHP_EOL
            . PHP_EOL
        );
    }
}

SomeTrait::someTraitFunction();

class SomeClass
{
    use SomeTrait;
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

SomeClass::$someClassVariable = 256;
$someObject->someObjectVariable = 'hi';

$someObject->someObjectFunction();
