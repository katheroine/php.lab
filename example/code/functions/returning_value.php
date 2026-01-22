<?php

function returning_boolean(): bool
{
  return true;
}

function returning_integer(): int
{
  return 7;
}

function returning_string(): string
{
  return "hello";
}

$b = returning_boolean();
print("boolean:\n"
  . "b = {$b}\n\n");

$i = returning_integer();
print("integer:\n"
  . "i = {$i}\n\n");

$s = returning_string();
print("string:\n"
  . "s = {$s}\n\n");
