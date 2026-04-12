<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 1024;
}

class OtherClass
{
    public $someProperty = 1024;
}

$someObject = new SomeClass();
$otherObject = new SomeClass();
$anotherObject = new OtherClass();

print("Objects of different classes:\n\n");

if ($someObject == $anotherObject) {
    print("Are equal\n");
} else {
    print("Are not equal\n");
}
if ($someObject === $anotherObject) {
    print("Are identical\n");
} else {
    print("Are not identical\n");
}
print(PHP_EOL);

print("Different objects of the same class:\n\n");

if ($someObject == $otherObject) {
    print("Are equal\n");
} else {
    print("Are not equal\n");
}
if ($someObject === $otherObject) {
    print("Are identical\n");
} else {
    print("Are not identical\n");
}
print(PHP_EOL);

print("The same object:\n\n");

if ($someObject == $someObject) {
    print("Are equal\n");
} else {
    print("Are not equal\n");
}
if ($someObject === $someObject) {
    print("Are identical\n");
} else {
    print("Are not identical\n");
}
print(PHP_EOL);
