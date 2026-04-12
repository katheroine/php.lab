<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Weak references allow the programmer to retain a reference to an object
// which does not prevent the object from being destroyed.
// They are useful for implementing cache like structures."
// -- https://www.php.net/manual/en/class.weakreference.php

$someObject = new stdClass();
$someReference = &$someObject;

var_dump($someReference);
unset($someObject);
var_dump($someReference);

print(PHP_EOL);

$otherObject = new stdClass();
$otherReference = WeakReference::create($otherObject);

var_dump($otherReference->get());
unset($otherObject);
var_dump($otherReference->get());

print(PHP_EOL);
