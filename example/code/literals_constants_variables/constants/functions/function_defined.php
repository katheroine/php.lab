<?php
// PHP Reference: www.php.net/manual/en/function.defined.php

define('NUMBER', 15);
const TEXT = "Hello, there!";

print("Is number defined: "
    . (defined('NUMBER') ? 'yes' : 'no')
    . "\nIs text defined: "
    . (defined('TEXT') ? 'yes' : 'no')
    . "\nIs answer definer: "
    . (defined('ANSWER')? 'yes' : 'no')
    . "\n");
