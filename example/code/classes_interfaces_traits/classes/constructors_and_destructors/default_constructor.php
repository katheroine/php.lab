#!/usr/bin/php8.1
<?php

class Basket {
    public function __construct() {
        $this->capacity = 3;
        $this->load_counter = 0;
    }

    public function put(string $item): void {
        if ($this->load_counter < $this->capacity) {
            $this->items[$this->load_counter] = $item;
            $this->load_counter++;
        }
    }

    public function pull(): string {
        if ($this->load_counter > 0) {
            $item = $this->items[$this->load_counter - 1];
            $this->items[$this->load_counter - 1] = "";
            $this->load_counter--;
        } else {
            $item = "";
        }

        return $item;
    }

    public function show(): void {
        foreach ($this->items as $item) {
            print($item . " ");
        }
        print("\n");
    }

    private int $capacity;
    private array $items = [];
    private int $load_counter;
}

$handbasket = new Basket();

$handbasket->put("apple");
$handbasket->put("pear");
$handbasket->put("plum");
$handbasket->put("peach");

print("BASKET:\n");

$handbasket->show();

print("REMOVED ITEMS:\n");

print($handbasket->pull() . "\n");
print($handbasket->pull() . "\n");

print("BASKET:" . "\n");

$handbasket->show();

print("REMOVED ITEMS:\n");

print($handbasket->pull() . "\n");
print($handbasket->pull() . "\n");

print("BASKET:\n");

$handbasket->show();
