<?php

class SomeClass
{
    public static function constructByStatic()
    {
        return new static;
    }

    public static function constructBySelf()
    {
        return new self;
    }
}

$static = SomeClass::constructByStatic();
$self = SomeClass::constructBySelf();

print(get_class($static) . PHP_EOL);
print(get_class($self) . PHP_EOL);

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
    static public function constructByParent()
    {
        return new parent;
    }
}

$static = SomeSubclass::constructByStatic();
$self = SomeSubclass::constructBySelf();
$parent = SomeSubclass::constructByParent();

print(get_class($static) . PHP_EOL);
print(get_class($self) . PHP_EOL);
print(get_class($parent) . PHP_EOL);

print(PHP_EOL);

class SomeOverridinSubclass extends SomeClass
{
    public static function constructByStatic()
    {
        return new static;
    }

    public static function constructBySelf()
    {
        return new self;
    }
}

$static = SomeOverridinSubclass::constructByStatic();
$self = SomeOverridinSubclass::constructBySelf();

print(get_class($static) . PHP_EOL);
print(get_class($self) . PHP_EOL);

print(PHP_EOL);
