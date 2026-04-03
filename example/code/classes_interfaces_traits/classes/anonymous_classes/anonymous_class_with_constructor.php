<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someObject = new class ('with constructor and...') {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';
    private readonly string $someReadonlyProperty;

    public function __construct(
        private string $otherProperty,
        string $someParameter = 'with readonly property'
    ) {
        $this->someReadonlyProperty = $someParameter;
    }

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . " class\n"
            . $this->otherProperty . PHP_EOL
            . $this->someReadonlyProperty . PHP_EOL
        );
    }
};

$someObject->someMethod();
