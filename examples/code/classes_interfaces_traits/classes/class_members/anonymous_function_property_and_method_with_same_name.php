<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class PaintPalette
{
    private $palette = [
        'red',
        'blue',
        'yellow',
    ];

    public $colours;

    function __construct()
    {
        $this->colours = function() {
            return $this->palette;
        };
    }

    function colours()
    {
        return $this->palette;
    }
}

$palette = new PaintPalette();
print_r(($palette->colours)());
print_r($palette->colours());

