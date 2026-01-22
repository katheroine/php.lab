<?php

function function_with_default_argument(int $argument = 3): int
{
  return $argument * 2;
}

$result = function_with_default_argument();
print("Result of calling function with default argument: {$result}\n");

$result = function_with_default_argument(4);
print("Result of calling function with provided argument: {$result}\n");
