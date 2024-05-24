<?php

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
