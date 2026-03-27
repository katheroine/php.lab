<?php

class BaseClass
{
    public function somePublicMethod()
    {
        return 'base: public';
    }

    protected function someProtectedMethod()
    {
        return 'base: protected';
    }

    private function somePrivateMethod()
    {
        return 'base: private';
    }

    public function someMethod()
    {
        print(
            '# From ' . static::class . PHP_EOL . PHP_EOL
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class DerivedClass extends BaseClass
{
    public function somePublicMethod()
    {
        return 'derived: public';
    }

    public function someProtectedMethod()
    {
        return 'derived: protected';
    }

    public function somePrivateMethod()
    {
        return 'derived: private';
    }

}

$baseObject = new BaseClass();
$baseObject->someMethod();

$derivedObject = new DerivedClass();
$derivedObject->someMethod();
