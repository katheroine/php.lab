<?php

print "The largest integer supported: PHP_INT_MAX = " . PHP_INT_MAX . " (" . gettype(PHP_INT_MAX) . ")\n";
$i = PHP_INT_MAX + 1;
print "Bigger than maximal integer: PHP_INT_MAX + 1 = (" . gettype($i) . ")\n\n";
print "The smallest integer supported: PHP_INT_MIN = " . PHP_INT_MIN . " (" . gettype(PHP_INT_MIN) . ")\n";
$i = PHP_INT_MIN - 1;
print "Smaller than minimal integer: PHP_INT_MIN - 1 = $i (" . gettype($i) . ")\n\n";
print "The size of an integer in bytes: PHP_INT_SIZE = " . PHP_INT_SIZE . " (" . gettype(PHP_INT_SIZE) . ")\n\n";
