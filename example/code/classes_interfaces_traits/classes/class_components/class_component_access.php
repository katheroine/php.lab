#!/usr/bin/php8.0
<?php

class MoneyBox {
  public string $name = "";
  public float $saved_amount = 0;

  public function save(float $amount) : void {
    $this->saved_amount += $amount;
  }
}

$piggy = new MoneyBox();

$piggy->name = "Piggy";
$piggy->save(25);

print("Money box name: " . $piggy->name . "\n");
print("Money box saved amount: " . $piggy->saved_amount . "\n\n");

$money_box_ref = &$piggy;

$money_box_ref->name = "Miss Piggy";
$money_box_ref->save(30);

print("Money box name: " . $money_box_ref->name . "\n");
print("Money box saved amount: " . $money_box_ref->saved_amount . "\n\n");
