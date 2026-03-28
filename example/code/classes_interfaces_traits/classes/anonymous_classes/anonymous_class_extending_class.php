<?php

class SomeClass
{
    protected string $otherProperty = 'extending other class';
}

$someObject = new class extends SomeClass {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
            . $this->otherProperty . PHP_EOL
        );
    }
};

$someObject->someMethod();
