<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someRight = true;
$otherRight = TRUE;
$anotherRight = True;

print("true: ");
var_dump($someRight);

print("TRUE: ");
var_dump($otherRight);

print("True: ");
var_dump($anotherRight);

print(PHP_EOL);

$someWrong = false;
$otherWrong = FALSE;
$anotherWrong = False;

print("false: ");
var_dump($someWrong);

print("FALSE: ");
var_dump($otherWrong);

print("False: ");
var_dump($anotherWrong);

print(PHP_EOL);
