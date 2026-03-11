<?php

class SomeClass
{
    public $publicProperty;
    static $staticProperty;
    readonly string $readonlyProperty;
    final $finalProperty;
}

var_dump(get_class_vars(SomeClass::class));
