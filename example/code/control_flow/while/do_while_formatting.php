<?php

$i = 0;

do {
  print("{$i}...\n");
  ++$i;
} while ($i < 10);

print "\n";

$i = 0;

do {
  print($i++ . "...\n");
} while ($i < 10);

print "\n";

$i = 0;

do
  print($i++ . "...\n");
while ($i < 10);

print "\n";

$i = 0;

do print($i++ . "...\n"); while ($i < 10);

print "\n";
