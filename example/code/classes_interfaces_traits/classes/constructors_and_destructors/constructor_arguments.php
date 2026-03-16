<?php

class SomeClass
{
    public string $somePublicProperty = 'public';
    protected string $someProtectedProperty = 'protected';
    private string $somePrivateProperty = 'private';

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);
