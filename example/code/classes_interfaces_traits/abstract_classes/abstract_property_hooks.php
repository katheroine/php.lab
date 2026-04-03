<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

abstract class SomeAbstractClass
{
    abstract protected string $someProperty {
        set;
        get;
    }

    abstract protected string $someSetProperty {
        set;
    }

    abstract protected string $someGetProperty {
        get;
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

class SomeClass extends SomeAbstractClass
{
    public string $someProperty;

    protected string $someSetProperty {
        set => $this->someGetProperty = $value . '>';
    }

    protected string $someGetProperty = '' {
        get => '<' . $this->someGetProperty;
    }
}

$someObject = new SomeClass();
$someObject->someProperty = 'some';
$someObject->someMethod('value');
print($someObject->otherMethod() . PHP_EOL);
