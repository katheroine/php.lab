<?php

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
