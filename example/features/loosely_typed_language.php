<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someVariable = 1024;
print("\$someVariable = 1024; // " . $someVariable . " (" . gettype($someVariable) . ")\n\n");

$otherVariable = "hello";
print("\$otherVariable = \"hello\"; // " . $otherVariable . " (" . gettype($otherVariable) . ")\n\n");

$anotherVariable = $someVariable . $otherVariable;
print("\$anotherVariable = \$someVariable . \$otherVariable; // " . $anotherVariable . " (" . gettype($anotherVariable) . ")\n\n");

$someVariable = "bye";
print("\$someVariable = \"bye\"; // " . $someVariable . " (" . gettype($someVariable) . ")\n\n");
