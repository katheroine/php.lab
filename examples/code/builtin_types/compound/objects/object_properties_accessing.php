<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someObjectFromArray = (object) [
    'some_key' => 'some value',
    'other key' => 1024,
    10 => 10.5,
];

print("From array:\n\n");

print("some_key: {$someObjectFromArray->some_key}\n");
print("other key: {$someObjectFromArray->{'other key'}}\n");
print("other key: {$someObjectFromArray->{10}}\n\n");

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $privateProperty = 'hello';

    public function getProtectedProperty()
    {
        return $this->protectedProperty;
    }

    public function getPrivateProperty()
    {
        return $this->privateProperty;
    }
}

$someObjectFromClass = new SomeClass();

print("From class:\n\n");

print("publicProperty: {$someObjectFromClass->publicProperty}\n");
print("protectedProperty: {$someObjectFromClass->getProtectedProperty()}\n");
print("privateProperty: {$someObjectFromClass->getPrivateProperty()}\n\n");
