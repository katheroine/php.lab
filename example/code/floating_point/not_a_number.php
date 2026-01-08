<?php

$not_a_number = acos(2);
print "\$not_a_number = acos(2); // {$not_a_number} (" . gettype($not_a_number) . ")\n";

print PHP_EOL;

print "is_nan(\$not_a_number): " . is_nan($not_a_number) . "\n";

print PHP_EOL;
