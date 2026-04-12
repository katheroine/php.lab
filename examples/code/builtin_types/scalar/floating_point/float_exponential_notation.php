<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$scientificNotationWithoutSign = 5e3;
print("5e3: ");
var_dump($scientificNotationWithoutSign);

$scientificNotationWithoutSign = 5E3;
print("5E3: ");
var_dump($scientificNotationWithoutSign);

print(PHP_EOL);

$scinetifictNotificationPlusSign = 5e+3;
print("5e+3: ");
var_dump($scinetifictNotificationPlusSign);

$scinetifictNotificationPlusSign = 5E+3;
print("5E+3: ");
var_dump($scinetifictNotificationPlusSign);

print(PHP_EOL);

$scientificNotificationMinusSign = 5e-3;
print("5e-3: ");
var_dump($scientificNotificationMinusSign);

$scientificNotificationMinusSign = 5E-3;
print("5E-3: ");
var_dump($scientificNotificationMinusSign);

print(PHP_EOL);
