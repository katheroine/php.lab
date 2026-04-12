<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class PaintPalette
{
    public $colours = [
        'red',
        'blue',
        'yellow',
    ];

    function colours()
    {
        return $this->colours;
    }
}

$palette = new PaintPalette();
print_r($palette->colours);
print_r($palette->colours());
