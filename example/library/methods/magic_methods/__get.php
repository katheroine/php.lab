<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __get(string $propertyName): mixed
    {
        print(
            "Magic method __get\n\n"
            . "Argument name: {$propertyName}\n\n"
        );

        if (! isset($this->data[$propertyName])) {
            return null;
        }

        return $this->data[$propertyName];
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->platform . PHP_EOL . PHP_EOL);
