<?php

class SomeClass
{
    function __destruct()
    {
        print("SomeClass destructor\n\n");
    }
}

function someClassScope()
{
    print("Destroying SomeClass instance...\n\n");

    new SomeClass();
}

someClassScope();

class OtherClass extends SomeClass
{
}

function otherClassScope()
{
    print("Destroying OtherClass instance...\n\n");

    new OtherClass();

}

otherClassScope();

class AnotherClass extends SomeClass
{
    function __destruct()
    {
        print("AnotherClass destructor\n\n");
    }
}

function anotherClassScope()
{
    print("Destroying AnotherClass instance...\n\n");

    new AnotherClass();
}

anotherClassScope();

class DifferentClass extends SomeClass
{
    function __destruct()
    {
        parent::__destruct();
        print("DifferentClass destructor\n\n");
    }
}

function differentClassScope()
{
    print("Destroying DifferentClass instance...\n\n");

    new DifferentClass();
}

differentClassScope();
