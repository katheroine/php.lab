<?php

class SomeClass
{
    public function __construct()
    {
        print(
            "Magic method __construct\n"
        );
    }
}

$someObject = new SomeClass();
