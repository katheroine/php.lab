<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */


$number = 15;
$text = "Hello, there!";

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\nIs answer defined: "
    . (isset($answer) ? 'yes' : 'no')
    . "\n");
