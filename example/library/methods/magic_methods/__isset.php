<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __isset(string $propertyName): bool
    {
        print(
            "Magic method __isset\n\n"
            . "Property name: $propertyName\n\n"
        );

        return isset($this->data[$propertyName]);
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print(var_export(isset($someObject->platform), true) . PHP_EOL . PHP_EOL);
print(var_export(isset($someObject->unexistent), true) . PHP_EOL . PHP_EOL);
