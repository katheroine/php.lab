<?php

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

