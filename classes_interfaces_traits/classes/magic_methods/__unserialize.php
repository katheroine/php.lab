<?php

class SomeClass
{
    public $variable;

    public function __unserialize(array $data): void
    {
        print(
            "Magic method __unserialize\n"
            . "Data: "
        );
        var_dump($data);
    }
}

$someObject = new SomeClass();
$serialized = serialize($someObject);
unserialize($serialized);
