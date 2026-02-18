<?php

$notANumber = acos(2);

print("acos(2) value: {$notANumber} (" . gettype($notANumber) . ")\n");
print("Not a number: " . (is_nan($notANumber) ? 'yes' : 'no') . "\n");
