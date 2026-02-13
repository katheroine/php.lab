<?php

$someNothing = null;

$toBool = (bool) $someNothing;
print("To bool: ");
var_dump($toBool);
print(PHP_EOL);

$toInteger = (int) $someNothing;
print("To integer: ");
var_dump($toInteger);
print(PHP_EOL);

$toFloat = (float) $someNothing;
print("To float: ");
var_dump($toFloat);
print(PHP_EOL);

$toString = (string) $someNothing;
print("To string: ");
var_dump($toString);
print(PHP_EOL);

$toArray = (array) $someNothing;
print("To array:\n");
var_dump($toArray);
print(PHP_EOL);

$toObject = (object) $someNothing;
print("To object:\n");
var_dump($toObject);
print(PHP_EOL);
