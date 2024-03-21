<?php

$value = true ? "yep" : "nope";
print("Value: {$value}\n");

$value = false ? "yep" : "nope";
print("Value: {$value}\n");

$value = null ? "yep" : "nope";
print("Value: {$value}\n");

print(PHP_EOL);

$value = "yep" ?: "nope";
print("Value: {$value}\n");

$value = false ?: "nope";
print("Value: {$value}\n");

print(PHP_EOL);

$number = 3;
// $vaule = ($number < 2) ? "Number is less than 2." : ($number > 2) ? "Number is more than 2." : "Number is 2.";
$value = ($number < 2) ? "Number is less than 2." : (($number > 2) ? "Number is more than 2." : "Number is 2.");
print("Value: {$value}\n");

print(PHP_EOL);

($number < 10) ? print("Cool!\n") : print("Woah!\n");

print(PHP_EOL);
