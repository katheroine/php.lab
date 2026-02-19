<?php

$someNothing = null;
$nullToFloat = (float) $someNothing;
print("null to float: ");
var_dump($nullToFloat);

print(PHP_EOL);

$someRight = true;
$intToFloat = (float) $someRight;
print("true to float: ");
var_dump($intToFloat);

$someWrong = false;
$intToFloat = (float) $someWrong;
print("false to float: ");
var_dump($intToFloat);

print(PHP_EOL);

$someNumber = 0;
$floatToFloat = (float) $someNumber;
print("0 to float: ");
var_dump($floatToFloat);

$someNumber = 1;
$floatToFloat = (float) $someNumber;
print("1 to float: ");
var_dump($floatToFloat);

$someNumber = 3;
$floatToFloat = (float) $someNumber;
print("3 to float: ");
var_dump($floatToFloat);

$someNumber = -3;
$floatToFloat = (float) $someNumber;
print("-3 to float: ");
var_dump($floatToFloat);

print(PHP_EOL);

$someText = "";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = " ";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "false";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "true";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "0";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "1";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "3";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "-3";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "3.6";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "-3.6";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "null";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "a";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

$someText = "three";
$stringToFloat = (float) $someText;
print("\"{$someText}\" to float: ");
var_dump($stringToFloat);

print(PHP_EOL);

$someCollection = [];
$arrayToFloat = (float) $someCollection;
print("[] to float: ");
var_dump($arrayToFloat);

$someCollection = [true];
$arrayToFloat = (float) $someCollection;
print("[true] to float: ");
var_dump($arrayToFloat);

$someCollection = [false];
$arrayToFloat = (float) $someCollection;
print("[false] to float: ");
var_dump($arrayToFloat);

$someCollection = [0];
$arrayToFloat = (float) $someCollection;
print("[0] to float: ");
var_dump($arrayToFloat);

$someCollection = [1];
$arrayToFloat = (float) $someCollection;
print("[1] to float: ");
var_dump($arrayToFloat);

$someCollection = [''];
$arrayToFloat = (float) $someCollection;
print("[''] to float: ");
var_dump($arrayToFloat);

$someCollection = [null];
$arrayToFloat = (float) $someCollection;
print("[null] to float: ");
var_dump($arrayToFloat);

$someCollection = [null, true, 2];
$arrayToFloat = (float) $someCollection;
print("[null, true, 2] to float: ");
var_dump($arrayToFloat);

$someCollection = [null, true, 2];
$arrayToFloat = (float) $someCollection;
print("[1, 2, 3] to float: ");
var_dump($arrayToFloat);

print(PHP_EOL);
