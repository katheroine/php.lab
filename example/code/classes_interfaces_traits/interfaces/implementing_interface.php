<?php

interface Displayable
{
    public function getLabel(): string;
    public function getContent(): string;
}

class Datum implements Displayable
{
    public function __construct(
        private string $label,
        protected string $description
    ) {
    }

    public function getLabel(): string
    {
        return "Description: " . $this->description;
    }
}

$someDatum = new Datum(
    'Great operating system',
    'Linux is a great operating system for geeks, nerds and academics.'
);

print(
    $someDatum->getLabel() . PHP_EOL
    . $someDatum->getContent() . PHP_EOL
    . PHP_EOL
);
