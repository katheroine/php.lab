<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private const string UNSERIALISATION_HIDDEN_FIELD_MESSAGE = 'hidden during unserialisation';

    public function __construct(
        public string $somePublicProperty = 'some public',
        public string $otherPublicProperty = 'other public',
        protected string $someProtectedProperty = 'some protected',
        protected string $otherProtectedProperty = 'other protected',
        private string $somePrivateProperty = 'some private',
        private string $otherPrivateProperty = 'other private',
    ) {
    }

    public function __unserialize(array $data): void
    {
        print(
            "Magic method __unserialize\n\n"
            . "Data:\n"
        );
        var_dump($data);
        print(PHP_EOL);

        $this->somePublicProperty = $data['somePublicProperty'];
        $this->otherPublicProperty = $data['otherPublicProperty'];
        $this->someProtectedProperty = static::UNSERIALISATION_HIDDEN_FIELD_MESSAGE;
        $this->otherProtectedProperty = static::UNSERIALISATION_HIDDEN_FIELD_MESSAGE;
        $this->somePrivateProperty = static::UNSERIALISATION_HIDDEN_FIELD_MESSAGE;
        $this->otherPrivateProperty = static::UNSERIALISATION_HIDDEN_FIELD_MESSAGE;
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
