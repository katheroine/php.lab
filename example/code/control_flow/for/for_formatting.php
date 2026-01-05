<?php

for ($i = 0; $i < 10; $i++)
  echo "{$i}...\n";

echo "\n";

for ($i = 0; $i < 10; $i++) echo "{$i}...\n";

echo "\n";

for ($i = 0; $i < 10; $i++) {
  echo "{$i}...\n";
}

echo "\n";

// Shortened form for HTML templates:

for ($i = 0; $i < 10; $i++):
  echo "{$i}...\n";
endfor;

echo "\n";

for ($i = 0; $i < 10; $i++): echo "{$i}...\n"; endfor;

echo "\n";
