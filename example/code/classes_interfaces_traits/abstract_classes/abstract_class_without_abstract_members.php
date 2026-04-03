<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

abstract class Datum
{
    protected string $description;

    public function formatDescriptionAsText(): string
    {
        return "Description: " . $this->description;
    }
}

class Content extends Datum
{
    public function __construct(
        protected string $core,
        protected string $description = ""
    ) {
    }

    public function formatCoreAsText(): string
    {
        return "Core: " . $this->core;
    }

    public function show(): void
    {
        print(
            $this->formatDescriptionAsText() . PHP_EOL
            . $this->formatCoreAsText() . PHP_EOL
        );
    }
}

$lectio = new Content(
    "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
    "De beneficiis lectionis"
);

$lectio->show();
