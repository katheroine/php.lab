<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public const SOME_PUBLIC_CLASS_CONSTANT = 'some public class constant';
    protected const SOME_PROTECTED_CLASS_CONSTANT = 'some protected class constant';
    private const SOME_PRIVATE_CLASS_CONSTANT = 'some private class constant';

    public static string $somePublicClassVariable = 'some public class variable';
    protected static string $someProtectedClassVariable = 'some protected class variable';
    private static string $somePrivateClassVariable = 'some private class variable';

    public string $somePublicObjectVariable = 'some public object variable';
    protected string $someProtectedObjectVariable = 'some protected object variable';
    private string $somePrivateObjectVariable = 'some private object variable';

    public readonly string $somePublicUnchengeableVariable;
    protected readonly string $someProtectedUnchengeableVariable;
    private readonly string $somePrivateUnchengeableVariable;

    public function __construct(string $someArgument)
    {
        $this->somePublicUnchengeableVariable = 'some public unchangeable variable - ' . $someArgument;
        $this->someProtectedUnchengeableVariable = 'some protected unchangeable variable - ' . $someArgument;
        $this->somePrivateUnchengeableVariable = 'some private unchangeable variable - ' . $someArgument;
    }

    public static function somePublicClassFunction(): void
    {
        print(
            "Some public class function\n\n"
            . SomeClass::SOME_PUBLIC_CLASS_CONSTANT . PHP_EOL
            . SomeClass::SOME_PROTECTED_CLASS_CONSTANT . PHP_EOL
            . SomeClass::SOME_PRIVATE_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PUBLIC_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CLASS_CONSTANT . PHP_EOL
            . SomeClass::$somePublicClassVariable . PHP_EOL
            . SomeClass::$someProtectedClassVariable . PHP_EOL
            . SomeClass::$somePrivateClassVariable . PHP_EOL
            . self::$somePublicClassVariable . PHP_EOL
            . self::$someProtectedClassVariable . PHP_EOL
            . self::$somePrivateClassVariable . PHP_EOL
            . PHP_EOL
        );

        SomeClass::someProtectedClassFunction();
        SomeClass::somePrivateClassFunction();
        self::someProtectedClassFunction();
        self::somePrivateClassFunction();
    }

    protected static function someProtectedClassFunction(): void
    {
        print("Some protected class function\n\n");
    }

    private static function somePrivateClassFunction(): void
    {
        print("Some private class function\n\n");
    }

    public function somePublicObjectFunction(): void
    {
        print(
            "Some public object function\n\n"
            . SomeClass::SOME_PUBLIC_CLASS_CONSTANT . PHP_EOL
            . SomeClass::SOME_PROTECTED_CLASS_CONSTANT . PHP_EOL
            . SomeClass::SOME_PRIVATE_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PUBLIC_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CLASS_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CLASS_CONSTANT . PHP_EOL
            . SomeClass::$somePublicClassVariable . PHP_EOL
            . SomeClass::$someProtectedClassVariable . PHP_EOL
            . SomeClass::$somePrivateClassVariable . PHP_EOL
            . self::$somePublicClassVariable . PHP_EOL
            . self::$someProtectedClassVariable . PHP_EOL
            . self::$somePrivateClassVariable . PHP_EOL
            . $this->somePublicObjectVariable . PHP_EOL
            . $this->someProtectedObjectVariable . PHP_EOL
            . $this->somePrivateObjectVariable . PHP_EOL
            . $this->somePublicUnchengeableVariable . PHP_EOL
            . $this->someProtectedUnchengeableVariable . PHP_EOL
            . $this->somePrivateUnchengeableVariable . PHP_EOL
            . PHP_EOL
        );
    }
}

SomeClass::somePublicClassFunction();

$someObject = new SomeClass('initialised');
$someObject->somePublicObjectFunction();

SomeClass::$somePublicClassVariable .= ' - modified';
$someObject->somePublicObjectVariable .= ' - modified';

print(someClass::$somePublicClassVariable . PHP_EOL);
print($someObject->somePublicObjectVariable . PHP_EOL . PHP_EOL);
