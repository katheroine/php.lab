<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public function getDetails()
    {
        return (object)
        [
            'color' => 'orange',
        ];
    }

    public function getData()
    {
        return null;
    }
}

$someObject = new SomeClass();

print("Value: {$someObject->getDetails()->color}\n");
print("Value: {$someObject->getDetails()?->color}\n");
// print("Value: {$someObject->getData()->smell}\n");
print("Value: {$someObject->getData()?->smell}\n");
