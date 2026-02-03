#!/usr/bin/php8.1
<?php

class Value {
  public float $value = 0;
  public string $label;

  public function __construct(float $value, string $label = "") {
    $this->value = $value;
    $this->label = $label;

    print("% Value constructor is running...\n");
  }

  public function __destruct() {
    print("% Value destructor is running...\n");
  }
}

class Datum extends Value {
  public string $description;

  public function __construct(float $value, string $label, string $description = "") {
    $this->value = $value;
    $this->label = $label;
    $this->description = $description;

    print("# Datum constructor is running...\n");
  }

  public function __destruct() {
    print("# Datum destructor is running...\n");
  }

  public function show() : void {
    print("Value: " . $this->value
      . "\nLabel: " . $this->label
      . "\nDescription: " . $this->description . "\n"
    );
  }
}

$temperature = new Datum(24, "Temperature in degree Celsius", "The Central European summer day temperature");

$temperature->show();
