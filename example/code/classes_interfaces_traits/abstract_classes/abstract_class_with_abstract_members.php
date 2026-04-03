<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

abstract class Value
{
    abstract protected string $description{
        set;
        get;
    }
    abstract public function show(): void;

    public function __construct(
        public float $value = 0,
        public string $label = ""
    ) {
        $this->value = $value;
        $this->label = $label;
    }
}

class Datum extends Value
{
    public string $description;

    public function __construct(float $value, string $label, string $description = "")
    {
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
    }

    public function show(): void
    {
        print("Value: " . $this->value
            . "\nLabel: " . $this->label
            . "\nDescription: " . $this->description . "\n"
        );
    }
}

class Content extends Datum
{
}

$page = new Content(666, "Page of Harry Potter book", "The satanistic ritual hidden in the book for kids. Oh noes!");
$page->show();
