<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Return available SPL classes"
// -- https://www.php.net/manual/en/function.spl-classes.php

$splClasses = spl_classes();

var_dump($splClasses);
