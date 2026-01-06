<?php

$c = 10;
$a = 0;

start:
$a += $c;
$c--;
if ($c == 0)
  goto stop;
goto start;

stop:
print($a . "\n");
