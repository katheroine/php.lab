<?php

$someRight = true;
$otherRight = TRUE;
$anotherRight = True;

print("true: ");
var_dump($someRight);

print("TRUE: ");
var_dump($otherRight);

print("True: ");
var_dump($anotherRight);

print(PHP_EOL);

$someWrong = false;
$otherWrong = FALSE;
$anotherWrong = False;

print("false: ");
var_dump($someWrong);

print("FALSE: ");
var_dump($otherWrong);

print("False: ");
var_dump($anotherWrong);

print(PHP_EOL);
