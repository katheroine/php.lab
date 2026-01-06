<?php

$a = [10, 20, 30, 40, 50, 60, 70, 80, 90];

foreach ($a as $i)
  echo "{$i}...\n";

echo "\n";

foreach ($a as $i) echo "{$i}...\n";

echo "\n";

foreach ($a as $i) {
  echo "{$i}...\n";
}

echo "\n";

// Shortened form for HTML templates:

foreach ($a as $i):
  echo "{$i}...\n";
endforeach;

echo "\n";

foreach ($a as $i): echo "{$i}...\n"; endforeach;

echo "\n";
