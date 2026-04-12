<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someObject = new class {
};

print('Type: ' . gettype($someObject) . PHP_EOL);
print('Class: ' . get_class($someObject) . PHP_EOL);
