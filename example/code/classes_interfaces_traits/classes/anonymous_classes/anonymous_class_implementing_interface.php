<?php

interface SomeInterface
{
    public function someMethod(): void;
}

$someObject = new class implements SomeInterface {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . " class\nimplementing interface\n"
        );
    }
};

$someObject->someMethod();
