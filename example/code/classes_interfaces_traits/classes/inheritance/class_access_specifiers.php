#!/usr/bin/php8.1
<?php

class Mammal {
  public bool $isDomesticated;

  protected bool $hasTail;

  private bool $isMilkFeeded = true;
  private string $classTaxon = "Mammalia";
}

class Fox extends Mammal {
  public string $name;

  public function __construct() {
    $this->hasTail = true;
    $this->isDomesticated = false;
  }

  public function show() : void {
    print("Hi, my name is " . $this->name
      // . ".\nClass: " . $this->classTaxon
      . "\nSpecies: " . $this->speciesTaxon
      // . "\nAm I milk-feeded as a cub? " . $this->isMilkFeeded
      . "\nDo I have tail? " . $this->hasTail
      . "\nDo I have fur? " . $this->hasFur
      . "\nAm I domesticated? " . $this->isDomesticated
      . "\n"
    );
  }

  private bool $hasFur = true;
  private string $speciesTaxon = "Vulpes vulpes";
}

class UrbanFox extends Fox {
  public function display() : void {
    print("Hi, my name is " . $this->name
      // . ".\nClass: " . $this->classTaxon
      // . "\nSpecies: " . $this->speciesTaxon
      // . "\nAm I milk-feeded as a cub? " . $this->isMilkFeeded
      . "\nDo I have tail? " . $this->hasTail
      // . "\nDo I have fur? " . $this->hasFur
      . "\nAm I domesticated? " . $this->isDomesticated
      . "\n"
    );
  }
}

$foxFerdinand = new Fox();

$foxFerdinand->name = "Ferdinand";
$foxFerdinand->isDomesticated = true;

$foxFerdinand->show();

print("\nHi, my name is " . $foxFerdinand->name
  // . ".\nClass: " . $foxFerdinand->classTaxon
  // . "\nSpecies: " . $foxFerdinand->speciesTaxon
  // . "\nAm I milk-feeded as a cub? " . $foxFerdinand->isMilkFeeded
  // . "\nDo I have tail? " . $foxFerdinand->hasTail
  // . "\nDo I have fur? " . $foxFerdinand->hasFur
  . "\nAm I domesticated? " . $foxFerdinand->isDomesticated
  . "\n\n"
);

$foxMelody = new UrbanFox();

$foxMelody->name = "Melody";

$foxMelody->display();
