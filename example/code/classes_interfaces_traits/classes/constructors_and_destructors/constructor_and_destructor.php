<?php

class SomeClass
{
    public function __construct()
    {
        print("Constructor is running...\n");
    }

    public function __destruct()
    {
        print("Destructor is running...\n");
    }

    public function action(): void
    {
        print("Some action is performing...\n");
    }
}

print("The object will be created now.\n");

$someObject = new SomeClass();
$someObject->action();

print("The program will end now.\n");
