<?php

if (1 > 2)
  print("1 > 2\n");
elseif (2 > 3)
  print("2 > 3\n");
else
  print("!(1 > 2) && !(2 > 3)\n");

if (1 > 2)
  print("1 > 2\n");
elseif (1 > 0)
  print("1 > 0\n");
else
  print("!(1 > 2) && !(1 > 0)\n");

if (2 > 1)
  print("2 > 1\n");
elseif (1 > 0)
  print("1 > 0\n");
else
  print("!(2 > 1) && !(1 > 0)\n");
