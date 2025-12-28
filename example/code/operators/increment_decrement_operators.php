<?php

$a = 6; $b = 3;

print("\$a = {$a}, \$b = {$b}\n");
// Preincrementation
print("++\$a : " . (++$a) . " (" . $a . ")\n");
// Predecrementation
print("--\$b : " . (--$b) . " (" . $b . ")\n");

print(PHP_EOL);

print("\$a = {$a}, \$b = {$b}\n");
// Postincrementation
print("\$a++ : " . ($a++) . " (" . $a . ")\n");
// Postdecrementation
print("\$b-- : " . ($b--) . " (" . $b . ")\n");

print(PHP_EOL);
