<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "A generic empty class with dynamic properties."
// -- https://www.php.net/manual/en/class.stdclass.php

$someObject = new stdClass();

print_r($someObject);

$someObject->title = "Blue Elephant";
$someObject->author = "Katheroine";
$someObject->description = "PHP programming language tutorial";

print_r($someObject);

$otherObject = (object) [
    'nickname' => 'katheroine',
    'language' => 'PHP',
    'area' => 'web development',
    'specialisation' => 'backend'
];

print_r($otherObject);
