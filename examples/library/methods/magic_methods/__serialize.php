<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public function __construct(
        public string $somePublicProperty = 'some public',
        public string $otherPublicProperty = 'other public',
        protected string $someProtectedProperty = 'some protected',
        protected string $otherProtectedProperty = 'other protected',
        private string $somePrivateProperty = 'some private',
        private string $otherPrivateProperty = 'other private',
    ) {
    }

    public function __serialize(): array
    {
        print(
            "Magic method __serialize\n\n"
        );

        return [
            'somePublicProperty' => $this->somePublicProperty,
            'someProtectedProperty' => $this->someProtectedProperty,
            'somePrivateProperty' => $this->somePrivateProperty,
        ];
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$result = serialize($someObject);

print($result . PHP_EOL . PHP_EOL);

$coresult = unserialize($result);

var_dump($coresult);
print(PHP_EOL);
