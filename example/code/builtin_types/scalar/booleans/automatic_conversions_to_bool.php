<?php

$i = 0;
print("\$i = 0; // (" . gettype($i) . ")\n");
if ($i) print "casted to true\n";
else print "casted to false\n";

$i = 1;
print("\$i = 1; // (" . gettype($i) . ")\n");
if ($i) print "casted to true\n";
else print "casted to false\n";

$i = 3;
print("\$i = 3; // (" . gettype($i) . ")\n");
if ($i) print "casted to true\n";
else print "casted to false\n";

$i = -3;
print("\$i = -3; // (" . gettype($i) . ")\n");
if ($i) print "casted to true\n";
else print "casted to false\n";

print PHP_EOL;

$d = 0.0;
print("\$d = 0.0; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = -0.0;
print("\$d = -0.0; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = 1.0;
print("\$d = 1.0; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = 3.0;
print("\$d = 3.0; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = -3.0;
print("\$d = -3.0; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = 0.1;
print("\$d = 0.1; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = 3.14;
print("\$d = 3.14; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

$d = -3.14;
print("\$d = -3.14; // (" . gettype($d) . ")\n");
if ($d) print "casted to true\n";
else print "casted to false\n";

print PHP_EOL;

$s = "";
print("\$s = \"\"; // empty string (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = " ";
print("\$s = \" \"; // space (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "0";
print("\$s = \"0\"; // empty string (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "\0";
print("\$s = \"\\0\"; // null (\\0) character (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "a";
print("\$s = \"a\"; // (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "false";
print("\$s = \"false\"; // (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "true";
print("\$s = \"true\"; // (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

print PHP_EOL;

$a = [];
print("\$a = []; // (" . gettype($a) . ")\n");
if ($a) print "casted to true\n";
else print "casted to false\n";

$a = [0];
print("\$a = [0]; // (" . gettype($a) . ")\n");
if ($a) print "casted to true\n";
else print "casted to false\n";

$a = [null];
print("\$a = [null]; // (" . gettype($a) . ")\n");
if ($a) print "casted to true\n";
else print "casted to false\n";
