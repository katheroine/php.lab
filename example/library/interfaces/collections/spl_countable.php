<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Classes implementing Countable can be used with the count() function."
// -- https://www.php.net/manual/en/class.countable.php

class SomeContainer implements Countable
{
    private array $storage = [];

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // Countable method
    public function count(): int
    {
        return count($this->storage);
    }
}

$someThings = new SomeContainer();

print('Count: ' . count($someThings) . PHP_EOL);

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store('spoon');

print('Count: ' . count($someThings) . PHP_EOL);
