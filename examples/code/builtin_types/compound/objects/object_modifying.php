<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 10
    ) {
    }

    public function setProtectedProperty($protectedProperty)
    {
        $this->protectedProperty = $protectedProperty;
    }

    public function setPrivateProperty($privateProperty)
    {
        $this->privateProperty = $privateProperty;
    }
}

$someObject = new SomeClass('some value', 15.5);

print_r($someObject);
print(PHP_EOL);

$someObject->publicProperty = 'hello';
$someObject->setProtectedProperty(0.2);
$someObject->setPrivateProperty(1024);

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = '16';
$someObject->otherDynamicProperty = 'coffee';

print_r($someObject);
print(PHP_EOL);
