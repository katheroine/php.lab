<?php

$now = "morning";

switch ($now):
  case "morning":
    print("Good morning!\n");
    break;
  case "afternoon":
    print("Good afternoon!\n");
    break;
  case "evening":
    print("Good evening!\n");
    break;
  case "night":
    print("Good evening!\n");
    break;
  default:
    print("Hello!\n");
    break;
endswitch;
