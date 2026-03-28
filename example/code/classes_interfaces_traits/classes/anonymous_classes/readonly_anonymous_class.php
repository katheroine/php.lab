<?php

$someObject = new readonly class {
    private const string SOME_CONSTANT = 'some';

    public function __construct(
        private string $someProperty = 'anonymous readonly'
    ) {}

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
