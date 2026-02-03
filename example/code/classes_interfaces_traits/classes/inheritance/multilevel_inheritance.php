#!/usr/bin/php8.1
<?php

class Mammal {
  public bool $isDomesticated = false;
  public bool $hasTail = false;

  public static bool $isMilkFeeded = true;
  public static string $classTaxon = "Mammalia";
}

class Fox extends Mammal {
  public string $name;

  public static bool $hasFur = true;
  public static string $speciesTaxon = "Vulpes vulpes";

  public function __construct() {
    $this->hasTail = true;
    $this->isDomesticated = false;
  }

  public function show() : void {
    print("Hi, my name is " . $this->name
      . ".\nClass: " . self::$classTaxon
      . "\nSpecies: " . self::$speciesTaxon
      . "\nAm I milk-feeded as a cub? " . self::$isMilkFeeded
      . "\nDo I have tail? " . $this->hasTail
      . "\nDo I have fur? " . self::$hasFur
      . "\nAm I domesticated? " . $this->isDomesticated
      . "\n"
    );
  }
}

class PetFox extends Fox {
  public function __construct() {
    $this->isDomesticated = true;
  }
}

$foxFerdinand = new Fox();
$foxFerdinand->name = "Ferdinand";

$foxFerdinand->show();
print("\n");

$foxAgnes = new PetFox();
$foxAgnes->name = "Agnes";

$foxAgnes->show();
print("\n");
