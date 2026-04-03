<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function inside(): string
{
  print("* Inside.\n");
  return "IN";
}

function outside(): string
{
  print("# Outside:\n"
    . "# Calling function from function...\n");
  $result = inside();
  print("# result: {$result}\n");
  return "OUT";
}

print("Calling function...\n");
$result = outside();
print("result: {$result}\n");
