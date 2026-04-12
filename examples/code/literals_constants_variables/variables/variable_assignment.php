<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someVariable = 15;
$otherVariable = "Hello, there!";

print("Some variable: {$someVariable}\nOther variable: {$otherVariable}\n\n");

$byValue = $someVariable;
$byReference = &$otherVariable;

print("Assinged by value: {$byValue}\nAssigned by reference: {$byReference}\n\n");

$someVariable = 1024;
$otherVariable = "Fly me to the moon.";

print("Some variable: {$someVariable}\nOther variable: {$otherVariable}\n\n");
print("Assinged by value: {$byValue}\nAssigned by reference: {$byReference}\n\n");
