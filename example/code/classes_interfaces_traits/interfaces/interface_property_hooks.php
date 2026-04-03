<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

interface SomeInterface
{
    public string $someProperty {
        set;
        get;
    }

    public string $someSetProperty {
        set;
    }

    public string $someGetProperty {
        get;
    }
}

class SomeClass implements SomeInterface
{
    public string $someProperty;

    public string $someSetProperty {
        set => $this->someGetProperty = $value . '>';
    }

    public string $someGetProperty = '' {
        get => '<' . $this->someGetProperty;
    }

    public function someMethod(string $value): void
    {
        $this->someSetProperty = $value;
    }

    public function otherMethod(): string
    {
        return $this->someProperty . ' ' . $this->someGetProperty;
    }
}

$someObject = new SomeClass();
$someObject->someProperty = 'some';
$someObject->someMethod('value');
print($someObject->otherMethod() . PHP_EOL);
