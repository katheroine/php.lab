<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */


define('NUMBER', 15);
const TEXT = "Hello, there!";

print("Is number defined: "
    . (defined('NUMBER') ? 'yes' : 'no')
    . "\nIs text defined: "
    . (defined('TEXT') ? 'yes' : 'no')
    . "\nIs answer definer: "
    . (defined('ANSWER')? 'yes' : 'no')
    . "\n");
