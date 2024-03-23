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

    final public static function someUnextendableClassFunction(): void
    {
        self::someClassFunction();
    }

    final public function someUnextendableObjectFunction(): void
    {
        $this->someObjectFunction();
    }
}

class SomePropertiesOverridingSubclass extends SomeClass
{
    public const SOME_CLASS_CONSTANT = 'ulala';
    public static int $someClassVariable = 2048;
    public string $someObjectVariable = 'hey';
}

SomePropertiesOverridingSubclass::someClassFunction();

$someSubobject1 = new SomePropertiesOverridingSubclass();
$someSubobject1->someObjectFunction();

class SomeOverridingSubclass extends SomeClass
{
    public const SOME_CLASS_CONSTANT = 'nanana';
    public static int $someClassVariable = 4096;
    public string $someObjectVariable = 'welcome';

    public function __construct()
    {
        // $this->someUnchengeableVariable = 3.5;
        parent::__construct();
    }

    public static function someClassFunction(): void
    {
        print(
            SomeClass::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . SomeOverridingSubclass::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . parent::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . self::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . SomeClass::$someClassVariable . ',' . PHP_EOL
            . SomeOverridingSubclass::$someClassVariable . ',' . PHP_EOL
            . parent::$someClassVariable . ',' . PHP_EOL
            . self::$someClassVariable . ',' . PHP_EOL
            . PHP_EOL
        );
    }

    public function someObjectFunction(): void
    {
        print(
            SomeClass::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . SomeOverridingSubclass::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . parent::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . self::SOME_CLASS_CONSTANT . ',' . PHP_EOL
            . SomeClass::$someClassVariable . ',' . PHP_EOL
            . SomeOverridingSubclass::$someClassVariable . ',' . PHP_EOL
            . parent::$someClassVariable . ',' . PHP_EOL
            . self::$someClassVariable . ',' . PHP_EOL
            . $this->someObjectVariable . ',' . PHP_EOL
            . $this->someUnchengeableVariable . ',' . PHP_EOL
            . PHP_EOL
        );
    }

    // final public static function someUnextendableClassFunction(): void
    // {
    //     self::someClassFunction();
    // }

    // final public function someUnextendableObjectFunction(): void
    // {
    //     $this->someObjectFunction();
    // }
}

SomeOverridingSubclass::someClassFunction();

$someSubobject2 = new SomeOverridingSubclass();
$someSubobject2->someObjectFunction();

final class SomeUnextendableClass
{
}

// class SomeExtendingSubclass extends SomeUnextendableClass
// {
// }
