<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

define('NUMBER', 15);
const VALUE = 12.4;
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nValue: " . constant('VALUE') . "\nText: " . (get_defined_constants())['TEXT'] . "\n");
