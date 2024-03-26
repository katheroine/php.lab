<?php

class SomeClass
{
    public function __sleep(): array
    {
        print(
            "Magic method __sleep\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
serialize($someObject);
