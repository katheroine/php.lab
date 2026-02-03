#!/usr/bin/php8.1
<?php

class Mammal {
    public bool $hasTail;
    public static bool $isMilkFeeded = true;
    public const CLASS_TAXON = "Mammalia";

    public function display(): void {
        print("Class: " . self::CLASS_TAXON
            . "\nClass: " . Mammal::CLASS_TAXON
            . "\nIs it milk-feeded as a cub? " . self::$isMilkFeeded
            . "\nIs it milk-feeded as a cub? " . Mammal::$isMilkFeeded
            . "\nDoes it have tail? " . $this->hasTail . "\n"
        );
    }
}

class Fox extends Mammal {
    public string $name;
    public static bool $hasFur = true;
    public const SPECIES_TAXON = "Vulpes vulpes";

    public function show(): void {
        print("Hi, my name is " . $this->name
            . ".\nClass: " . self::CLASS_TAXON
            . "\nClass: " . Mammal::CLASS_TAXON
            . "\nClass: " . Fox::CLASS_TAXON
            . "\nSpecies: " . self::SPECIES_TAXON
            . "\nSpecies: " . Fox::SPECIES_TAXON
            . "\nAm I milk-feeded as a cub? " . self::$isMilkFeeded
            . "\nAm I milk-feeded as a cub? " . Mammal::$isMilkFeeded
            . "\nAm I milk-feeded as a cub? " . Fox::$isMilkFeeded
            . "\nDo I have tail? " . $this->hasTail
            . "\nDo I have fur? " . self::$hasFur
            . "\nDo I have fur? " . Fox::$hasFur . "\n"
        );
    }

    public function display(): void {
        print("Name: " . $this->name
            . "\nSpecies: " . self::SPECIES_TAXON
            . "\nSpecies: " . Fox::SPECIES_TAXON . "\n"
        );
        parent::display();
        print("Does it have fur? " . self::$hasFur
            . "\nDoes it have fur? " . Fox::$hasFur . "\n"
        );
    }
}

$foxFerdinand = new Fox();
$foxFerdinand->name = "Ferdinand";
$foxFerdinand->hasTail = true;

$foxFerdinand->show();
print("\n");
$foxFerdinand->display();
print("\n");
