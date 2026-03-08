<?php

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
