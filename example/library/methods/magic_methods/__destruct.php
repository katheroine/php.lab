<?php

class SomeClass
{
    public function __destruct()
    {
        print(
            "Magic method __destruct\n"
        );
    }
}

$someObject = new SomeClass();
