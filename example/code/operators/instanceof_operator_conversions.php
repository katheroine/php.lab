<?php

$i = 3;
$d = 2.5;
$s = "abc";
$c = new stdClass;
class dClass extends stdClass {}
$e = new dClass;
class nClass {}
$n = new nClass;

echo "\$i: ";
var_dump($i);
$is_stdclass = ($i instanceof stdClass);
print("\$i instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$d: ";
var_dump($d);
$is_stdclass = ($d instanceof stdClass);
print("\$d instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$s: ";
var_dump($s);
$is_stdclass = ($s instanceof stdClass);
print("\$s instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$c: ";
var_dump($c);
$is_stdclass = ($c instanceof stdClass);
print("\$c instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$e: ";
var_dump($e);
$is_stdclass = ($e instanceof stdClass);
print("\$e instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$n: ";
var_dump($n);
$is_stdclass = ($n instanceof stdClass);
print("\$n instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");
