<?php

class SomeClass
{
    function __construct()
    {
        print("SomeClass constructor\n");
    }
}

new SomeClass();

class OtherClass extends SomeClass
{
}

new OtherClass();

class AnotherClass extends SomeClass
{
    function __construct()
    {
        print("AnotherClass constructor\n");
    }
}

new AnotherClass();

class DifferentClass extends SomeClass
{
    function __construct()
    {
        parent::__construct();
        print("DifferentClass constructor\n");
    }
}

new DifferentClass();