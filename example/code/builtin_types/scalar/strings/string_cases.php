<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someCite = "Stat rosa pristina nomine, nomina nuda tenemus.";
print("Original: {$someCite}\n");

$upperCaseCite = strtoupper($someCite);
print("Upper case: {$upperCaseCite}\n");

$lowerCaseCite = strtolower($someCite);
print("Lower case: {$lowerCaseCite}\n");
