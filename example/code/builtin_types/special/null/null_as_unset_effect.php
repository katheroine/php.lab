<?php

$someValue = 10;

print("Some value: ");
var_dump($someValue);

unset($someValue);

print("Some value after unset: ");
var_dump($someValue);
// PHP Warning:  Undefined variable $someValue
