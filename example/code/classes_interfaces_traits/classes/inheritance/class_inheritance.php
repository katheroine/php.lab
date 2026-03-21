<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'public constant';
    protected const SOME_PROTECTED_CONSTANT = 'protected constant';
    private const SOME_PRIVATE_CONSTANT = 'private constant';

    public $somePublicProperty = 'public property';
    protected $someProtectedProperty = 'protected property';
    private $somePrivateProperty = 'private property';

    public function somePublicMethod()
    {
        return 'public method';
    }

    protected function someProtectedMethod()
    {
        return 'protected method';
    }

    private function somePrivateMethod()
    {
        return 'private method';
    }

    public function someMethod()
    {
        print(
            '# ' . __METHOD__
            . "\n\n* private:\n"
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . $this->somePrivateMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function otherMethod()
    {
        $this->someMethod();
        print(
            '#' . __METHOD__
            . "\n\n* protected:\n"
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print(
    "# Global scope:\n\n"
    . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . $someObject->somePublicProperty . PHP_EOL
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

$someObject->otherMethod();
