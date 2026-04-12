<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $someProperty;

    public function __construct(string $someProperty)
    {
        print("Construction...\n");

        $this->someProperty = $someProperty;
    }
}

$someReflection = new ReflectionClass(SomeClass::class);
$someProxy = $someReflection->newLazyProxy(function (SomeClass $object) {
    return new SomeClass('initialised');
});

print(
    'Proxy type: ' . gettype($someProxy) . PHP_EOL
    . 'Proxy class: ' . get_class($someProxy) . PHP_EOL
    . PHP_EOL
);

var_dump($someProxy);
print(PHP_EOL);

print("Property reading: {$someProxy->someProperty}\n\n");

var_dump($someProxy);
print(PHP_EOL);
