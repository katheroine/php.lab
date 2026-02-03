#!/usr/bin/php8.1
<?php

class Value {
    public float $value = 0;
    public string $label;

    public function __construct(float $value, string $label = "") {
        $this->value = $value;
        $this->label = $label;
    }

    public function show() : void {
        print($this->label . ": " . $this->value . "\n");
    }
}

class Datum extends Value {
    public string $description;

    public function __construct(float $value, string $label, string $description = "") {
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
    }

    public function show() : void {
        print("Value: " . $this->value
            . "\nLabel: " . $this->label
            . "\nDescription: " . $this->description . "\n"
        );
    }
}

function display(Value $value): void {
  $value->show();
}

$temperature = new Datum(24, "Temperature in degree Celsius", "The Central European summer day temperature");

display($temperature);
