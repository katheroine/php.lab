<?php
// PHP Reference: https://www.php.net/manual/en/function.settype.php

$someVariable = "15";

print("Some variable: " . $someVariable . ": " . gettype($someVariable) . "\n");

settype($someVariable, 'integer');

print("Some variable: " . $someVariable . ": " . gettype($someVariable) . "\n");

settype($someVariable, 'boolean');

print("Some variable: " . $someVariable . ": " . gettype($someVariable) . "\n");
