<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "A WeakMap is map (or dictionary) that accepts objects as keys."
// -- https://www.php.net/manual/en/class.weakmap.php

$someMap = new WeakMap();

$someKey = new stdClass;

class SomeClass {
    public function __destruct() {
        print("Destructed\n");
    }
}

$someMap[$someKey] = new SomeClass();

print('Count: ' . count($someMap) . PHP_EOL);
unset($someKey);
print('Count: ' . count($someMap) . PHP_EOL);
