<?php

print "The largest float supported: PHP_FLOAT_MAX = " . PHP_FLOAT_MAX . " (" . gettype(PHP_FLOAT_MAX) . ")\n";
$bigger = PHP_FLOAT_MAX + 0.1;
print "Bigger than maximal float: PHP_FLOAT_MAX + 0.1 = {$bigger} (" . gettype($bigger) . ")\n\n";
print "The smallest (positive) float supported: PHP_FLOAT_MIN = " . PHP_FLOAT_MIN . " (" . gettype(PHP_FLOAT_MIN) . ")\n";
$smaller = PHP_FLOAT_MIN - 0.1;
print "Smaller than minimal float: PHP_FLOAT_MIN - 0.1 = {$smaller} (" . gettype($smaller) . ")\n\n";
print "Number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = " . PHP_FLOAT_DIG . " (" . gettype(PHP_FLOAT_DIG) . ")\n\n";
print "Smallest representable positive number x, so that x + 1.0 != 1.0" . PHP_FLOAT_EPSILON . " (" . gettype(PHP_FLOAT_EPSILON) . ")\n\n";
