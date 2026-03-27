<?php

class PaintPalette
{
    private $palette = [
        'red',
        'blue',
        'yellow',
    ];

    public $colours;

    public function __construct()
    {
        $this->colours = function () {
            return $this->palette;
        };
    }

    public function colours()
    {
        return $this->palette;
    }
}

$palette = new PaintPalette();
print_r(($palette->colours)());
print_r($palette->colours());
