<?php

// is_float:
print "is_float(0): " . is_float(0) . "\n";
print "is_float(1): " . is_float(1) . "\n";
print "is_float(-1): " . is_float(-1) . "\n";
print "is_float(1.0): " . is_float(1.0) . "\n";
print "is_float(-1.0): " . is_float(-1.0) . "\n";
print "is_float(1.1): " . is_float(1.1) . "\n";
print "is_float(-1.1): " . is_float(-1.1) . "\n";
print "is_float(1.9e411): " . is_float(1.9e411) . " // infinity\n";
print "is_float(-1.9e411): " . is_float(-1.9e411) . " // -infinity\n";
print "is_float(acos(2)): " . is_float(acos(2)) . " // not-a-number\n";
print "is_float(null): " . is_float(null) . "\n";
print "is_float('1.1'): " . is_float('1.1') . "\n";

print(PHP_EOL);

// is_float alias:
print "is_double(0): " . is_double(0) . "\n";
print "is_double(1): " . is_double(1) . "\n";
print "is_double(-1): " . is_double(-1) . "\n";
print "is_double(1.0): " . is_double(1.0) . "\n";
print "is_double(-1.0): " . is_double(-1.0) . "\n";
print "is_double(1.1): " . is_double(1.1) . "\n";
print "is_double(-1.1): " . is_double(-1.1) . "\n";
print "is_double(1.9e411): " . is_double(1.9e411) . " // infinity\n";
print "is_double(-1.9e411): " . is_double(-1.9e411) . " // -infinity\n";
print "is_double(acos(2)): " . is_double(acos(2)) . " // not-a-number\n";
print "is_double(null): " . is_double(null) . "\n";
print "is_double('1.1'): " . is_double('1.1') . "\n";

print(PHP_EOL);
