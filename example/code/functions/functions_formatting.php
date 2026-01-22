<?php

function explicit_function(int $number, string $text): int
{
  print("An explicit function with some arguments:\nnumber: $number\ntext: $text\n");
  return 2 * $number;
}

$result_1 = explicit_function(1, "apple");
print("returned value: $result_1\n\n");

$anonymous_function = function(int $number, string $text): int
{
  print("A function with some arguments:\nnumber: $number\ntext: $text\n");
  return 3 * $number;
};

$result_2 = $anonymous_function(2, "pear");
print("returned value: $result_2\n\n");
