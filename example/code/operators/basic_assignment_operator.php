<?php

$someValue = 5;
$otherValue = "pumpkin";

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);

$otherValue = $someValue;
$someValue = $someValue + 3;

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);
