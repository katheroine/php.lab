<?php

class SomeClass
{
    function __construct(
        public mixed $mixedProperty = null,
        public bool $booleanProperty = true,
        public int $integerProperty = 5,
        public float $floatingPointProperty = 2.4,
        public string $stringProperty = 'hello',
        public array $arrayProperty = [3, 5, 7],
        public iterable $iterableProperty = [
            2 => "Hello, there!",
            'color' => 'orange',
            3.14 => 'PI',
        ],
        public OtherClass $objectProperty = new OtherClass(),
        public ?stdClass $simpleObjectProperty = null,
    )
    {
        $this->simpleObjectProperty = (object) [
            2 => "Hello, there!",
            'color' => 'orange',
            3.14 => 'PI',
        ];
    }
}

class OtherClass
{
}

$someObject = new SomeClass();

print(
    var_export($someObject->mixedProperty, true) . ' (' . gettype($someObject->mixedProperty) . ")\n"
    . var_export($someObject->booleanProperty, true) . ' (' . gettype($someObject->booleanProperty) . ")\n"
    . var_export($someObject->integerProperty, true) . ' (' . gettype($someObject->integerProperty) . ")\n"
    . var_export($someObject->floatingPointProperty, true) . ' (' . gettype($someObject->floatingPointProperty) . ")\n"
    . var_export($someObject->stringProperty, true) . ' (' . gettype($someObject->stringProperty) . ")\n"
    . var_export($someObject->arrayProperty, true) . ' (' . gettype($someObject->arrayProperty) . ")\n"
    . var_export($someObject->iterableProperty, true) . ' (' . gettype($someObject->iterableProperty) . ")\n"
    . var_export($someObject->objectProperty, true) . ' (' . gettype($someObject->objectProperty) . ")\n"
    . var_export($someObject->simpleObjectProperty, true) . ' (' . gettype($someObject->simpleObjectProperty) . ")\n"
);
