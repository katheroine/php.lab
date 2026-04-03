<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$a = 1; $b = 2; $c = false;

// Less than
$c = $a < $b;
print("{$a} < {$b} = {$c}\n");
// Greater than
$c = $a > $b;
print("{$a} > {$b} = {$c}\n");
// Less than or equal to
$c = $a <= $b;
print("{$a} <= {$b} = {$c}\n");
// Greater than or equal to
$c = $a >= $b;
print("{$a} >= {$b} = {$c}\n");
// Equal
$c = $a == $b;
print("{$a} == {$b} = {$c}\n");
// Not equal
$c = $a != $b;
print("{$a} != {$b} = {$c}\n");
$c = $a <> $b;
print("{$a} != {$b} = {$c}\n");

// Identical
$c = $a === $b;
print("{$a} === {$b} = {$c}\n");
// Not identical
$c = $a !== $b;
print("{$a} !== {$b} = {$c}\n");

// Three-way comparison
$c = $a <=> $b; // "Spaceship operator"
print("{$a} <=> {$b} = {$c}\n");
