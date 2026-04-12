<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public object $someObjectProperty;

    public function __construct(string $someParameter)
    {
        $this->someObjectProperty = new class ($someParameter) {
            public function __construct(
                private string $someProperty
            ) {
            }

            public function setProperty(string $value)
            {
                $this->someProperty = $value;
            }

            public function getProperty(): string
            {
                return $this->someProperty;
            }
        };
    }
}

$someObject = new SomeClass('nested');
print($someObject->someObjectProperty->getProperty() . PHP_EOL);

$someObject->someObjectProperty->setProperty('modified');
print($someObject->someObjectProperty->getProperty() . PHP_EOL);
