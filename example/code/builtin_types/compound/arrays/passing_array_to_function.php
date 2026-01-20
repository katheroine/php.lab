<?php

function function_receiving_array_by_value(array $argument): array
{
  print("Function receiving array by value\n");
  print("-- begin:\n");

  foreach ($argument as $key => $value) {
    print("before: argument[$key] = $value\n");
    print("argument[$key] = argument[$key] * 2\n");

    $argument[$key] = $argument[$key] * 2;

    print("after: argument[$key] = $argument[$key]\n");
  }

  print("-- end.\n");

  return $argument;
}

$values = [9, 8, 7];

print("BEFORE: \$values = [ ");
foreach ($values as $element)
  print($element . " ");
print("]\n");

$result_values = function_receiving_array_by_value($values);

print("AFTER: \$values = [ ");
foreach ($values as $element)
  print($element . " ");
print("]\n");
print("AFTER: \$result_values = [ ");
foreach ($result_values as $element)
  print($element . " ");
print("]\n");
