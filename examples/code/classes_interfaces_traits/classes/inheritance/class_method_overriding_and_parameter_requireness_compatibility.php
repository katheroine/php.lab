<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class Flower
{
    private const STAMP = '*';

    public function bloom(int $quantity)
    {
        $blossoms = '';

        for ($i = 0; $i < $quantity; $i++) {
            $blossoms .= static::STAMP;
        }

        return $blossoms;
    }
}

class Rose extends Flower
{
    protected const STAMP = '@';

    public function bloom(int $quantity = 3): string
    {
        return parent::bloom($quantity);
    }
}

class RoseBush extends Rose
{
    public function bloom(int $columns = 3, int $rows = 3): string
    {
        $blossoms = '';

        for ($i = 0; $i < $rows; $i++) {
            $blossoms .= Rose::bloom($columns);

            if ($i < $rows - 1) {
                $blossoms .= PHP_EOL;
            }
        }

        return $blossoms;
    }
}

function garden(Flower $flower, int $number)
{
    print($flower->bloom($number) . PHP_EOL . PHP_EOL);
}

$flower = new Flower();
$rose = new Rose();
$bush = new RoseBush();

garden($flower, 3);
garden($rose, 4);
garden($bush, 5);
