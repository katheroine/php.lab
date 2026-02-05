<?php

abstract class Value { // Must be abstract class to have abstract method.
    public float $value = 0;
    public string $label;

    public function __construct(float $value, string $label = "") {
        $this->value = $value;
        $this->label = $label;
    }

    public abstract function show() : void;
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

class Content extends Datum {
}

// $temperature = new Value(24, "Health for humans temperature in degree Celsius"); // One cannot instantiate.

$page = new Content(666, "Page of Harry Potter book", "The satanistic ritual hidden in the book for kids. Oh noes!");
$page->show();
