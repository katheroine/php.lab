<?php
// PHP Reference: https://www.php.net/manual/en/function.get-defined-constants.php

define('NUMBER', 15);
const TEXT = 'Hello, there!';

print("Number: " . (get_defined_constants())['NUMBER'] . "\nText: " . (get_defined_constants())['TEXT'] . "\n");
