<?php

$a = 0; $b = 0;

print("\$a: {$a}\n");
print("\$b: {$b}\n");

print("\n");

$a = 0;
$b = 3;

print("\$a = 0; \$a: {$a}\n");
print("\$b = 3; \$b: {$b}\n");

print("\n");

$a = $b; // 3
$b = 5; // 5

print("\$a = {$b}; \$a: {$a}\n");
print("\$b = 5; \$b: {$b}\n");

print("\n");

$a += 3; // 6
print("\$a += 3; \$a: {$a}\n");

$a -= 2; // 4
print("\$a -= 2; \$a: {$a}\n");

$a *= 2; // 8
print("\$a *= 2; \$a: {$a}\n");

$a /= 4; // 2
print("\$a /= 4; \$a: {$a}\n");

$a %= 3; // 2
print("\$a %= 3; \$a: {$a}\n");

$a <<= 2; // 8
print("\$a <<= 2; \$a: {$a}\n");

$a >>= 1; // 4
print("\$a >>= 1; \$a: {$a}\n");

$a &= 6; // 4
print("\$a &= 6; \$a: {$a}\n");

$a |= 2; // 6
print("\$a |= 2; \$a: {$a}\n");

$a ^= 3; // 5
print("\$a ^= 3; \$a: {$a}\n");
