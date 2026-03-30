<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'per speculum';
    }

    public function otherMethod(): string
    {
        return 'in aenigmate';
    }
}

class SomeClass
{
    use SomeTrait;

    public function anotherMethod(): string
    {
        return
            'Videmus nunc ' . $this->someMethod()
            . ' et ' . $this->otherMethod() . '.';
    }
}

$someObject = new SomeClass();
print($someObject->anotherMethod() . PHP_EOL);
