<?php

// is_int:
print "is_int(0): " . is_int(0) . "\n";
print "is_int(1): " . is_int(1) . "\n";
print "is_int(-1): " . is_int(-1) . "\n";
print "is_int(1.0): " . is_int(1.0) . "\n";
print "is_int(-1.0): " . is_int(-1.0) . "\n";
print "is_int(1.1): " . is_int(1.1) . "\n";
print "is_int(-1.1): " . is_int(-1.1) . "\n";
print "is_int(1.9e411): " . is_int(1.9e411) . " // infinity\n";
print "is_int(-1.9e411): " . is_int(-1.9e411) . " // -infinity\n";
print "is_int(acos(2)): " . is_int(acos(2)) . " // not-a-number\n";
print "is_int(null): " . is_int(null) . "\n";
print "is_int('1'): " . is_int('1') . "\n";

print(PHP_EOL);

// is_int alias:
print "is_integer(0): " . is_integer(0) . "\n";
print "is_integer(1): " . is_integer(1) . "\n";
print "is_integer(-1): " . is_integer(-1) . "\n";
print "is_integer(1.0): " . is_integer(1.0) . "\n";
print "is_integer(-1.0): " . is_integer(-1.0) . "\n";
print "is_integer(1.1): " . is_integer(1.1) . "\n";
print "is_integer(-1.1): " . is_integer(-1.1) . "\n";
print "is_integer(1.9e411): " . is_integer(1.9e411) . " // infinity\n";
print "is_integer(-1.9e411): " . is_integer(-1.9e411) . " // -infinity\n";
print "is_integer(acos(2)): " . is_integer(acos(2)) . " // not-a-number\n";
print "is_integer(null): " . is_integer(null) . "\n";
print "is_integer('1'): " . is_integer('1') . "\n";

print(PHP_EOL);

// is_int alias:
print "is_long(0): " . is_long(0) . "\n";
print "is_long(1): " . is_long(1) . "\n";
print "is_long(-1): " . is_long(-1) . "\n";
print "is_long(1.0): " . is_long(1.0) . "\n";
print "is_long(-1.0): " . is_long(-1.0) . "\n";
print "is_long(1.1): " . is_long(1.1) . "\n";
print "is_long(-1.1): " . is_long(-1.1) . "\n";
print "is_long(1.9e411): " . is_long(1.9e411) . " // infinity\n";
print "is_long(-1.9e411): " . is_long(-1.9e411) . " // -infinity\n";
print "is_long(acos(2)): " . is_long(acos(2)) . " // not-a-number\n";
print "is_long(null): " . is_long(null) . "\n";
print "is_long('1'): " . is_long('1') . "\n";

print(PHP_EOL);
