<?php

$i = 0;

while ($i < 10)
{
  print($i++ . "...\n");

  if ($i > 5)
    continue;

  print("*********************\n");
}
