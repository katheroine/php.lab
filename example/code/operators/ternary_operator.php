<?php

$value = readline("Give some value: ");

$state = ($value < 10) ? "low" : "high";

print("Value is {$state}. ");

($value < 10) ? print("Cool!\n") : print("Woah!\n");
