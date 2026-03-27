<?php

class Mammal
{
    public bool $isDomesticated;

    protected bool $hasTail;

    private bool $isMilkFeeded = true;
    private string $classTaxon = "Mammalia";
}

class Fox extends Mammal
{
    public string $name;

    public function __construct()
    {
        $this->hasTail = true;
        $this->isDomesticated = false;
    }

    public function show(): void
    {
        print("Hi, my name is {$this->name}\n"
            . "Species: {$this->speciesTaxon}\n"
            . "Do I have tail? {$this->hasTail}\n"
            . "Do I have fur? {$this->hasFur}\n"
            . "Am I domesticated? {$this->isDomesticated}\n\n"
        );
    }

    private bool $hasFur = true;
    private string $speciesTaxon = "Vulpes vulpes";
}

class UrbanFox extends Fox
{
    public function display(): void
    {
        print("Hi, my name is {$this->name}\n"
            . "Do I have tail? {$this->hasTail}\n"
            . "Am I domesticated? {$this->isDomesticated}\n\n"
        );
    }
}

$foxFerdinand = new Fox();

$foxFerdinand->name = "Ferdinand";
$foxFerdinand->isDomesticated = true;

$foxFerdinand->show();

print("Hi, my name is {$foxFerdinand->name}\n"
    . "Am I domesticated? {$foxFerdinand->isDomesticated}\n\n"
);

$foxMelody = new UrbanFox();

$foxMelody->name = "Melody";

$foxMelody->display();
