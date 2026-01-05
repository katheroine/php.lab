<?php

$i = 0;

while ($i < 10) {
  print("{$i}...\n");
  ++$i;
}

print("\n");

$i = 0;

while ($i < 10) {
  print($i++ . "...\n");
}

print("\n");

$i = 0;

while ($i < 10)
  print($i++ . "...\n");

print("\n");

$i = 0;

while ($i < 10) print($i++ . "...\n"); ++$i;

print("\n");

// Shortened form for HTML templates:

$i = 0;

while ($i < 10):
  print("{$i}...\n");
  ++$i;
endwhile;

print("\n");

$i = 0;

while ($i < 10): print("{$i}...\n"); ++$i; endwhile;

print("\n");
