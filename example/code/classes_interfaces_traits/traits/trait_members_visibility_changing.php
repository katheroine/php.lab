<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'some method';
    }

    protected function otherMethod(): string
    {
        return 'other method';
    }

    private function anotherMethod(): string
    {
        return 'another method';
    }
}

class SomeClass
{
    use SomeTrait {
        SomeTrait::someMethod as protected;
        SomeTrait::otherMethod as private privateMethod;
        SomeTrait::anotherMethod as public publicMethod;
    }

    public function classContext()
    {
        print($this->someMethod() . PHP_EOL);
        print($this->privateMethod() . PHP_EOL);
    }
}

$someObject = new SomeClass();
$someObject->classContext();
print($someObject->publicMethod() . PHP_EOL);
