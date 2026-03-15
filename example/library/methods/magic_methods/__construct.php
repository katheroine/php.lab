<?php

class SomeClass
{
    public static $instanceQuantity = 0;

    public string $somePublicProperty;
    protected string $someProtectedProperty;
    private string $somePrivateProperty;

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        print(
            "Magic method __construct\n\n"
        );

        self::$instanceQuantity++;

        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

$someObject = new SomeClass();

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'pear',
    'orange',
    'banana'
);

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);
