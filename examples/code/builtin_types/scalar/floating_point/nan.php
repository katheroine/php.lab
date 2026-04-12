<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$notANumber = acos(2);

print("acos(2) value: {$notANumber} (" . gettype($notANumber) . ")\n");
print("Not a number: " . (is_nan($notANumber) ? 'yes' : 'no') . "\n");
