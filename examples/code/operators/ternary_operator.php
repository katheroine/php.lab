<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$value = readline("Give some value: ");

$state = ($value < 10) ? "low" : "high";

print("Value is {$state}. ");

($value < 10) ? print("Cool!\n") : print("Woah!\n");
