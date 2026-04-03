<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$i = 0;

while ($i < 10)
{
  print($i++ . "...\n");

  if ($i > 5)
    break;
}
