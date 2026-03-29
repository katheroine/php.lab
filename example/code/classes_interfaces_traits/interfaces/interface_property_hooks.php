<?php

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
