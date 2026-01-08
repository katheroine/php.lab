[⌂ Home](../../../README.md)
[▲ Previous: Null](../null/null.md)
[▼ Next: Integers](../integers/integers.md)

# Booleans

The **`bool` type** only has two values, and is used to express a truth value. It can be either `true` or `false`.

## Syntax

To specify a *`bool` literal*, use the constants `true` or `false`. Both are case-insensitive.

```php
<?php
$foo = True; // assign the value TRUE to $foo
?>
```

Typically, the result of an operator which returns a `bool` value is passed on to a control structure.

```php
<?php
$action = "show_version";
$show_separators = true;

// == is an operator which tests
// equality and returns a boolean
if ($action == "show_version") {
    echo "The version is 1.23";
}

// this is not necessary...
if ($show_separators == TRUE) {
    echo "<hr>\n";
}

// ...because this can be used with exactly the same meaning:
if ($show_separators) {
    echo "<hr>\n";
}
?>
```

## Converting to boolean

To explicitly convert a value to `bool`, use the `(bool)` cast. Generally this is not necessary because when a value is used in a logical context it will be automatically interpreted as a value of type `bool`.

When converting to `bool`, the following values are considered `false`:

* the boolean `false` itself
* the *integer* `0` (zero)
* the *floats* `0.0` and `-0.0` (zero)
* the empty *string* `""`, and the *string* `"0"`
* an *array* with zero elements
* the unit type `NULL` (including unset variables)

Internal objects that overload their casting behaviour to `bool`. For example: SimpleXML objects created from empty elements without attributes.
Every other value is considered true (including resource and NAN).

Warning

`-1` is considered `true`, like any other non-zero (whether negative or positive) number!

*Example: Casting to boolean*

```php
<?php
var_dump((bool) "");        // bool(false)
var_dump((bool) "0");       // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.boolean.php)

## Booleans as singleton types

**`Singleton` types** are those which allow only one value. PHP has support for two *singleton types*: `false` as of PHP 8.0.0 and `true` as of PHP 8.2.0.

Warning

Prior to PHP 8.2.0 the `false` type could only be used as part of a *union type*.

Note: It is not possible to define *custom singleton types*. Consider using an *enumerations* instead.

-- [PHP Reference](https://www.php.net/manual/en/language.types.singleton.php)

## Examples

*Example: Basic `bool` usage*

```php
<?php

$someAnswer = true;
$otherAnswer = false;

print("Some answer: {$someAnswer}\n");
var_dump($someAnswer);

print("Other answer: {$otherAnswer}\n");
var_dump($otherAnswer);

```

**View**:
[Example](../../../example/code/booleans/bool.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
Some answer: 1
bool(true)
Other answer:
bool(false)
```

*Example: `bool` definition*

```php
<?php

$a = true; $b = false;

echo "\$a = true; // {$a} (" . gettype($a) . ")\n";
echo "\$b = false; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = True; $b = False;

echo "\$a = True; // {$a} (" . gettype($a) . ")\n";
echo "\$b = False; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = TRUE; $b = FALSE;

echo "\$a = TRUE; // {$a} (" . gettype($a) . ")\n";
echo "\$b = FALSE; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

$a = (bool) 1; $b = (bool) 0;

echo "\$a = (bool) 1; // {$a} (" . gettype($a) . ")\n";
echo "\$b = (bool) 0; // {$b} (" . gettype($b) . ")\n";

echo PHP_EOL;

```

**View**:
[Example](../../../example/code/booleans/bool_definition.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
$a = true; // 1 (boolean)
$b = false; //  (boolean)

$a = True; // 1 (boolean)
$b = False; //  (boolean)

$a = TRUE; // 1 (boolean)
$b = FALSE; //  (boolean)

$a = (bool) 1; // 1 (boolean)
$b = (bool) 0; //  (boolean)

```

*Example: `bool` automatic conversions*

```php
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

$s = "\0";
print("\$s = \"\\0\"; // null (\\0) character (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = "";
print("\$s = \"\"; // empty string (" . gettype($s) . ")\n");
if ($s) print "casted to true\n";
else print "casted to false\n";

$s = " ";
print("\$s = \" \"; // space (" . gettype($s) . ")\n");
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

```

**View**:
[Example](../../../example/code/booleans/bool_automatic_conversion.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
$i = 0; // (integer)
casted to false
$i = 1; // (integer)
casted to true
$i = 3; // (integer)
casted to true
$i = -3; // (integer)
casted to true

$d = 0.0; // (double)
casted to false
$d = 1.0; // (double)
casted to true
$d = 3.0; // (double)
casted to true
$d = -3.0; // (double)
casted to true
$d = 0.1; // (double)
casted to true
$d = 3.14; // (double)
casted to true
$d = -3.14; // (double)
casted to true

$s = "\0"; // null (\0) character (string)
casted to true
$s = ""; // empty string (string)
casted to false
$s = " "; // space (string)
casted to true
$s = "a"; // (string)
casted to true
$s = "false"; // (string)
casted to true
$s = "true"; // (string)
casted to true

```

[▵ Up](#booleans)
[⌂ Home](../../../README.md)
[▲ Previous: Null](../null/null.md)
