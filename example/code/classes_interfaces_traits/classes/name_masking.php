#!/usr/bin/php8.1
<?php

class House {
  public string $balcony = "#####";

  public function siesta(): void {
    // $this is needed here, without it, the variable won't be recognized
    print("I'm gonna drink my coffe on the balcony: {$this->balcony}\n");
  }
}

class OperaHouse {
  public string $balcony = "=====";

  public function entrance(): void {
    print("We've got places on the balcony: {$this->balcony}\n");
  }

  public function scene(): void {
    print("Applause from the balcony: {$this->balcony}\n"
      . "The courtain is comming up.\n");

    $balcony = ":::::";
    print("Julia, oh Julia! Come to the balcony: {$balcony}\n");

    print("Applause from the balcony: {$this->balcony}\n");
  }
}

function singing(): string {
  return "Trill, trill!";
}

$balcony = "!!!!!";
print("Look at those beatiful flowers on that tenement balcony: {$balcony}\n"
  . "And the birds are singing the morning songs: " . singing() . "\n");

print("Let's go home.\n");

$home = new House();
$home->siesta();

print("Let's go to the opera tonight.\n");

$warsaw_great_theatre = new OperaHouse();
$warsaw_great_theatre->entrance();
$warsaw_great_theatre->scene();

$singing = "Lalalalalaaaaa!!!";
print("We're comming back home and the flowers looks awesome in the moon light on the tenement balcony: {$balcony}\n"
  . "And this party animal is singing the song of his people: {$singing}\n");
