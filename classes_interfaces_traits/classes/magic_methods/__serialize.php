<?php

class SomeClass
{
    public function __serialize(): array
    {
        print(
            "Magic method __serialize\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
serialize($someObject);
