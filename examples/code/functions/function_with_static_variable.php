<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function functionWithStaticVariable(): void
{
  $i = 0;
  static $n = 0;

  print("A regular local variable: {$i}\n"
    . "A static local variable: {$n}\n");

  $i++;
  $n++;
}

print("Function first call:\n");
functionWithStaticVariable();
print(PHP_EOL);

print("Function second call:\n");
functionWithStaticVariable();
print(PHP_EOL);

print("Function third call:\n");
functionWithStaticVariable();
print(PHP_EOL);
