<?php

class BaseClass
{
    static function createStatic()
    {
        return new static;
    }

    static function createSelf()
    {
        return new self;
    }
}

class DerivedClass extends BaseClass
{
    static function createParent()
    {
        return new parent;
    }
}

$fromBaseStaticObject = BaseClass::createStatic();

print("From base static\n");
var_dump($fromBaseStaticObject);
print(PHP_EOL);

$fromBaseSelfObject = BaseClass::createSelf();

print("From base self\n");
var_dump($fromBaseSelfObject);
print(PHP_EOL);

$fromDerivedStatic = DerivedClass::createStatic();

print("From derived static\n");
var_dump($fromDerivedStatic);
print(PHP_EOL);

$fromDerivedSelf = DerivedClass::createSelf();

print("From derived self\n");
var_dump($fromDerivedSelf);
print(PHP_EOL);

$fromDerivedParent = DerivedClass::createParent();

print("From derived parent\n");
var_dump($fromDerivedParent);
print(PHP_EOL);
