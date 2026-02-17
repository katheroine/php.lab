<?php

$someNumber = 10;
$otherNumber = +3;
$anotherNumber = -9;
$yetAnotherNumber = 10_000_1024;

print("10: ");
var_dump($someNumber);
print("+3: ");
var_dump($otherNumber);
print("-9: ");
var_dump($anotherNumber);
print("10_000_1024: ");
var_dump($yetAnotherNumber);

print(PHP_EOL);

$someBinary = 0b1111;
$otherBinary = 0B1111;

print("0b1111: ");
var_dump($someBinary);
print("0B1111: ");
var_dump($otherBinary);

print(PHP_EOL);

$someOctal = 017;
$otherOctal = 0o17;
$anotherOctal = 0O17;

print("017: ");
var_dump($someOctal);
print("0o17: ");
var_dump($otherOctal);
print("0O17: ");
var_dump($anotherOctal);

print(PHP_EOL);

$someDecimal = 15;

print("15: ");
var_dump($someDecimal);

print(PHP_EOL);

$someHaxadecimal = 0xf;
$otherHexadecimal = 0Xf;
$anotherHexadecimal = 0xF;
$yetAnotherHexadecimal = 0XF;

print("0xf: ");
var_dump($someHaxadecimal);
print("0Xf: ");
var_dump($otherHexadecimal);
print("0xF: ");
var_dump($anotherHexadecimal);
print("0XF:");
var_dump($yetAnotherHexadecimal);

print(PHP_EOL);
