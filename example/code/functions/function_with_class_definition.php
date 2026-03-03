<?php

function someFunction()
{
    class someClass
    {
        public $someProperty = 10;
    }

    $someObject = new SomeClass();

    print("Some function\n");
    print("Some class property: {$someObject->someProperty}\n");
}

someFunction();
