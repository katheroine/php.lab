<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Interface for customized serializing."
// -- https://www.php.net/manual/en/class.serializable.php

class SomeContainer implements Serializable
{
    private $storage = [];

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // Serializable methods

    public function serialize(): ?string
    {
        return serialize($this->storage);
    }

    public function unserialize(string $data): void
    {
        $this->storage = unserialize($data);
    }
}

$someThings = new SomeContainer();

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store('spoon');

print("Object:\n");
print_r($someThings);
print(PHP_EOL);

$serialized = serialize($someThings);

print("Serialized:\n{$serialized}\n\n");

$otherThings = unserialize($serialized);

print("Object:\n");
print_r($otherThings);
print(PHP_EOL);
