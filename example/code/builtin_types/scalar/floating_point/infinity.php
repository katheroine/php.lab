<?php

$positive_infinity = 1.9e411;
print "\$positive_infinity = 1.9e411; // {$positive_infinity} (" . gettype($positive_infinity) . ")\n";

$negative_infinity = -1.9e411;
print "\$negative_infinity = 1.9e411; // {$negative_infinity} (" . gettype($negative_infinity) . ")\n";

print PHP_EOL;

print "is_finite($positive_infinity): " . is_finite($positive_infinity) . "\n";
print "is_infinite($positive_infinity): " . is_infinite($positive_infinity) . "\n";

print "is_finite($negative_infinity): " . is_finite($negative_infinity) . "\n";
print "is_infinite($negative_infinity): " . is_infinite($negative_infinity) . "\n";

print PHP_EOL;
