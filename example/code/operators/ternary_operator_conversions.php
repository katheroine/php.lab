<?php

$result = false ? "yes" : "no";
print("false: {$result}\n");

$result = true ? "yes" : "no";
print("true: {$result}\n");

$result = 0 ? "yes" : "no";
print("0: {$result}\n");

$result = 2 ? "yes" : "no";
print("2: {$result}\n");

$result = "0" ? "yes" : "no";
print("\"0\": {$result}\n");

$result = "2" ? "yes" : "no";
print("\"2\": {$result}\n");

$result = "a" ? "yes" : "no";
print("\"a\": {$result}\n");

$result = null ? "yes" : "no";
print("null: {$result}\n");


