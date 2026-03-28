<?php

$someObject = new class {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
        );
    }
};

$someObject->someMethod();
