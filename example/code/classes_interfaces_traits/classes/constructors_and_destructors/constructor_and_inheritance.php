<?php

class SomeClass
{
    function __construct()
    {
        print("SomeClass constructor\n\n");
    }
}

print("Instantiating SomeClass...\n\n");

new SomeClass();

class OtherClass extends SomeClass
{
}

print("Instantiating OtherClass...\n\n");

new OtherClass();

class AnotherClass extends SomeClass
{
    function __construct()
    {
        print("AnotherClass constructor\n\n");
    }
}

print("Instantiating AnotherClass...\n\n");

new AnotherClass();

class DifferentClass extends SomeClass
{
    function __construct()
    {
        parent::__construct();
        print("DifferentClass constructor\n\n");
    }
}

print("Instantiating DifferentClass...\n\n");

new DifferentClass();
