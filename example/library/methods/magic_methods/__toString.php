<?php

class SomeClass
{
    public function __toString(): string
    {
        print(
            "Magic method __toString\n"
        );

        return "";
    }
}

$someObject = new SomeClass();
(string) $someObject;
