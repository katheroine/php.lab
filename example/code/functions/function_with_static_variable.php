#!/usr/bin/php
<?php

function function_with_static_variable(): void
{
  $i = 0;
  static $n = 0;

  print("A regular local variable: {$i}\n"
    . "A static local variable: {$n}\n");

  $i++;
  $n++;
}

print("Function first call:\n");
function_with_static_variable();
print("\n");

print("Function second call:\n");
function_with_static_variable();
print("\n");

print("Function third call:\n");
function_with_static_variable();
print("\n");
