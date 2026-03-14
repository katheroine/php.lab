<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __unset(string $propertyName): void
    {
        print(
            "Magic method __unset\n\n"
            . "Property name: $propertyName\n\n"
        );

        unset($this->data[$propertyName]);
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

unset($someObject->platform);

var_dump($someObject);
print(PHP_EOL);
