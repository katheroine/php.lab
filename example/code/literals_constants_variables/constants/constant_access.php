<?php

define('NUMBER', 15);
const VALUE = 12.4;
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nValue: " . constant('VALUE') . "\nText: " . (get_defined_constants())['TEXT'] . "\n");
