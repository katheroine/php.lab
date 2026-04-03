<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function functionReceivingArrayByValue(array $argument): array
{
  foreach ($argument as $key => $value) {
    $argument[$key] = $argument[$key] * 2;
  }

  return $argument;
}

function functionReceivingArrayByReference(array &$argument): array
{
  foreach ($argument as $key => $value) {
    $argument[$key] = $argument[$key] * 2;
  }

  return $argument;
}

$values = [9, 8, 7];

print("Passing by value:\n");
print("BEFORE: ");
foreach ($values as $element)
  print($element . " ");
print(PHP_EOL);

$result = functionReceivingArrayByValue($values);

print("AFTER:\n");
print("original: ");
foreach ($values as $element)
  print($element . " ");
print(PHP_EOL);
print("result: ");
foreach ($result as $element)
  print($element . " ");
print(PHP_EOL . PHP_EOL);

print("Passing by reference:\n");
print("BEFORE: ");
foreach ($values as $element)
  print($element . " ");
print(PHP_EOL);

$result = functionReceivingArrayByReference($values);

print("AFTER:\n");
print("original: ");
foreach ($values as $element)
  print($element . " ");
print(PHP_EOL);
print("result: ");
foreach ($result as $element)
  print($element . " ");
print(PHP_EOL . PHP_EOL);
