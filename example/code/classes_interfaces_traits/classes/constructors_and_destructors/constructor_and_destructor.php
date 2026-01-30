#!/usr/bin/php8.1
<?php

class Item {
  function __construct() {
    print("Constructor is running...\n");
  }

  function __destruct() {
    print("Destructor is running...\n");
  }

  function action() : void {
    print("Some action is performing...\n");
  }
}

print("The object will be created now.\n");

$thing = new Item();
$thing->action();

print("The program will end now.");
