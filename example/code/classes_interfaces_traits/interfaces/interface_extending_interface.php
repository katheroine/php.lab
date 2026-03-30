<?php

interface SomeInterface
{
    public function someMethod(): string;
}

interface OtherInterface extends SomeInterface
{
    public function otherMethod(): string;
}

class SomeClass implements OtherInterface
{
    public function someMethod(): string
    {
        return 'some method';
    }

    public function otherMethod(): string
    {
        return 'other method';
    }

    public function anotherMethod(): string
    {
        return
            'Videmus nunc ' . $this->someMethod()
            . ' et ' . $this->otherMethod() . '.';
    }
}

$someObject = new SomeClass();
print('Interfaces:' . PHP_EOL);
print_r(class_implements($someObject));
print('Extended interface method result: ' . $someObject->someMethod() . PHP_EOL);
print('Extending interface method result: ' . $someObject->otherMethod() . PHP_EOL);

print(PHP_EOL . $someObject->anotherMethod() . PHP_EOL);
