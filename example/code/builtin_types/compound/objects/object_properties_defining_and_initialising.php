<?php

$someObjectFromArray = (object)[
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];

print("From array:\n\n");
var_dump($someObjectFromArray);
print(PHP_EOL);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $somePrivateProperty;

    public function __construct(private $otherPrivateProperty = 'hello')
    {
        $this->somePrivateProperty = 64.5;
    }
}

$someObjectFromClass = new SomeClass();

print("From class without constructor argument:\n\n");
var_dump($someObjectFromClass);
print(PHP_EOL);

class OtherClass
{
    public bool $publicProperty;
    protected int $protectedProperty = 16;
    private float $somePrivateProperty;

    public function __construct(private string $otherPrivateProperty = 'hello')
    {
        $this->somePrivateProperty = 64.5;
    }
}

$otherObjectFromClass = new OtherClass(true);

print("From class with constructor argument:\n\n");
var_dump($otherObjectFromClass);
print(PHP_EOL);
