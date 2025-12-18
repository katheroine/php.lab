<?php
// PHP Reference: https://www.php.net/manual/en/function.get-defined-vars.php

$number = 15;
$text = "Hello, there!";

print("Number: " . (get_defined_vars())['number'] . "\nText: " . (get_defined_vars())['text'] . "\n");
