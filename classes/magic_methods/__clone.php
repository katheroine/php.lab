<?php

class SomeClass
{
    public function __clone(): void
    {
        print(
            "Magic method __clone\n"
        );
    }
}

$someObject = new SomeClass();
clone($someObject);
