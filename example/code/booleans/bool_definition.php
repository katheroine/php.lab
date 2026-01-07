<?php

$a = true; $b = false;

echo "\$a = true; // {$a} (" . gettype($a) . ")\n";
echo "\$b = false; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = True; $b = False;

echo "\$a = True; // {$a} (" . gettype($a) . ")\n";
echo "\$b = False; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = TRUE; $b = FALSE;

echo "\$a = TRUE; // {$a} (" . gettype($a) . ")\n";
echo "\$b = FALSE; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = (bool) 1; $b = (bool) 0;

echo "\$a = (bool) 1; // {$a} (" . gettype($a) . ")\n";
echo "\$b = (bool) 0; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;
