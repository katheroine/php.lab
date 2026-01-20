<?php

print "The largest (positive) floating point supported: PHP_FLOAT_MAX = " . PHP_FLOAT_MAX . " (" . gettype(PHP_FLOAT_MAX) . ")\n";
$f = PHP_FLOAT_MAX + 0.1;
print "Trying to make bigger than maximal floating point: PHP_FLOAT_MAX + 0.1 = $f (" . gettype($f) . ")\n\n";
print "The smallest (positive) floating point supported: PHP_FLOAT_MIN = " . PHP_FLOAT_MIN . " (" . gettype(PHP_FLOAT_MIN) . ")\n";
$f = PHP_FLOAT_MIN - 0.1;
print "Trying to make smaller than minimal floating point: PHP_FLOAT_MIN - 0.1 = $f (" . gettype($f) . ")\n\n";
print "The number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = " . PHP_FLOAT_DIG . " (" . gettype(PHP_FLOAT_DIG) . ")\n\n";
print "The smallest representable positive number x, so that x + 1.0 != 1.0: PHP_FLOAT_EPSILON = " . PHP_FLOAT_EPSILON . " (" . gettype(PHP_FLOAT_EPSILON) . ")\n\n";
