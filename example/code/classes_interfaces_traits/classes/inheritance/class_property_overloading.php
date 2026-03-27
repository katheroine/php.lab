<?php

class SomeClass
{
    private string $secret = 'secret';
    private array $data = [];

    public function __set(string $propertyName, mixed $propertyValue): void
    {
        $this->data[$propertyName] = $propertyValue;
    }

    public function __get(string $propertyName): mixed
    {
        if (! isset($this->data[$propertyName])) {
            return null;
        }

        return $this->data[$propertyName];
    }

    public function __isset(string $propertyName): bool
    {
        return isset($this->data[$propertyName]);
    }

    public function __unset(string $propertyName): void
    {
        unset($this->data[$propertyName]);
    }
}

$someObject = new SomeClass();

print(
    'something exists? ' . (isset($someObject->something) ? 'yes' : 'no') . PHP_EOL
    . 'secret exists? ' . (isset($someObject->secret) ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
);

$someObject->something = 'orange';
$someObject->secret = 'lemon';

print(
    'something exists? ' . (isset($someObject->something) ? 'yes' : 'no') . PHP_EOL
    . 'secret exists? ' . (isset($someObject->secret) ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
    . 'something value: ' . $someObject->something . PHP_EOL
    . 'secret value: ' . $someObject->secret . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);

unset($someObject->something);
unset($someObject->secret);

print(
    'something exists? ' . (isset($someObject->something) ? 'yes' : 'no') . PHP_EOL
    . 'secret exists? ' . (isset($someObject->secret) ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
);
