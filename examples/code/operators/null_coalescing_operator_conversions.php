<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$value = null ?? 'hello';
print("Value: {$value}\n");

$value = true ?? 'hello';
print("Value: {$value}\n");

$value = false ?? 'hello';
print("Value: {$value}\n");

$value = 'whatever' ?? 'hello';
print("Value: {$value}\n");
