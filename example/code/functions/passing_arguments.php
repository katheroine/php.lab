<?php

$value = 5;
$array = [2, 3, 6];
$object = (object)[ "value" => 7 ];

function functionReceivingValueByValue($argument)
{
    print("Function receiving value by value\n"
    . "-- begin:\n"
    . "before: \$argument = {$argument}\n"
    . "\$argument = \$argument * 2\n");

    $argument *= 2;

    print("after: \$argument = {$argument}\n"
    . "-- end.\n");
}

print("BEFORE: \$value = {$value}\n");
functionReceivingValueByValue($value);
print("AFTER: \$value = {$value}\n\n");

function functionReceivingValueByReference(&$argument)
{
  print("Function receiving value by reference\n"
    . "-- begin:\n"
    . "before: \$argument = {$argument}\n"
    . "\$argument = \$argument * 2\n");

  $argument *= 2;

  print("after: \$argument = {$argument}\n"
    . "-- end.\n");
}

print("BEFORE: \$value = {$value}\n");
functionReceivingValueByReference($value);
print("AFTER: \$value = {$value}\n\n");

function functionReceivingArrayByValue($argument)
{
  print("Function receiving array by value\n"
    . "-- begin:\n"
    . "before: \$argument[0] = {$argument[0]}\n"
    . "\$argument[0] *= 2\n");

  $argument[0] *= 2;

  print("after: \$argument[0] = {$argument[0]}\n"
    . "-- end.\n");
}

print("BEFORE: \$array[0] = {$array[0]}\n");
functionReceivingArrayByValue($array);
print("AFTER: \$array[0] = {$array[0]}\n\n");

function functionReceivingArrayByReference(&$argument)
{
  print("Function receiving array by reference\n"
    . "-- begin:\n"
    . "before: \$argument[0] = {$argument[0]}\n"
    . "\$argument[0] *= 2\n");

  $argument[0] *= 2;

  print("after: \$argument[0] = {$argument[0]}\n"
    . "-- end.\n");
}

print("BEFORE: \$array[0] = {$array[0]}\n");
functionReceivingArrayByReference($array);
print("AFTER: \$array[0] = {$array[0]}\n\n");

function functionReceivingObject($argument)
{
  print("Function receiving object\n"
    . "-- begin:\n"
    . "before: \$argument->value = {$argument->value}\n"
    . "\$argument = \$argument * 2\n");

  $argument->value *= 2;

  print("after: \$argument->value = {$argument->value}\n"
    . "-- end.\n");
}

print("BEFORE: object->value = {$object->value}\n");
functionReceivingObject($object);
print("AFTER: object->value = {$object->value}\n\n");
