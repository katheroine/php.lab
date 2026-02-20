<?php

$input = "  Hello, World!  ";
$clean = trim($input);
$upper = strtoupper($clean);
$replaced = str_replace("WORLD", "PHP", $upper);

print($replaced . PHP_EOL);
