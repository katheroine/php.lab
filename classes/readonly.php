<?php

class SomeClass
{
    public const SOME_CLASS_CONSTANT = 'lalala';
    public string $someChangeableVariable = 'hello';
    public readonly float $someUnchengeableVariable;

    public function __construct()
    {
        $this->someUnchengeableVariable = 1.5;
    }

    public function someFunction(): void
    {
        print(
            self::SOME_CLASS_CONSTANT . PHP_EOL
            . $this->someChangeableVariable . PHP_EOL
            . $this->someUnchengeableVariable . PHP_EOL
            . PHP_EOL
        );

        $this->someChangeableVariable = 128;
        // $this->someUnchengeableVariable = 512;
    }
}

$someObject = new SomeClass();
$someObject->someFunction();

$someObject->someChangeableVariable = 'hi';
// $someObject->someUnchengeableVariable = 2;

$someObject->someFunction();

$someObject->someUnexistentVariable = 10;

readonly class SomeUnchangeableClass
{
    public const SOME_CLASS_CONSTANT = 'nanana';
    // public static string $someClassVariable;
    public string $someVariable;
    public readonly float $someUnchengeableVariable;

    public function __construct()
    {
        $this->someVariable = 'hey';
        $this->someUnchengeableVariable = 3.25;
    }

    public function someFunction(): void
    {
        print(
            self::SOME_CLASS_CONSTANT . PHP_EOL
            . $this->someVariable . PHP_EOL
            . $this->someUnchengeableVariable . PHP_EOL
            . PHP_EOL
        );

        $this->someVariable = 128;
        // $this->someUnchengeableVariable = 512;
    }
}

$someUnchengeableObject = new SomeUnchangeableClass();

// $someUnchengeableObject->someVariable = 'welcome';
// $someUnchengeableObject->someUnchengeableVariable = 3;

// $someUnchengeableObject->someUnexistentVariable = 20;

readonly class SomeUnchangeableSubclass extends SomeUnchangeableClass
{
}
