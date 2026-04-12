<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

try {
    throw new Exception('The exception has been thrown.');
} catch (Exception) {
    print("The exception has been catched.\n");
}
