<?php

class SomeClass
{
    public $publicProperty;
    public static $staticProperty;
    public readonly string $readonlyProperty;
    final public $finalProperty;
}

var_dump(get_class_vars(SomeClass::class));
