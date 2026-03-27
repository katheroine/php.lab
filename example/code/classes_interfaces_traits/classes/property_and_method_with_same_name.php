<?php

class PaintPalette
{
    public $colours = [
        'red',
        'blue',
        'yellow',
    ];

    public function colours()
    {
        return $this->colours;
    }
}

$palette = new PaintPalette();
print_r($palette->colours);
print_r($palette->colours());
