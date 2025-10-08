<?php

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
