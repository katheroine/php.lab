[⌂ Home](../../../../../README.md)
[▲ Previous: Resources](../../special/resources/resources.md)
[▼ Next: Integers](../integers/integers.md)

# Booleans

## Description

The **`bool` type** only has two values, and is used to express a truth value. It can be either `true` or `false`.

*Example: Bool type*

```php
<?php

$someRight = true;
$someWrong = false;

print("Information:\n");
var_dump($someRight);
print('Type: ' . gettype($someRight) . PHP_EOL);
print("As string: {$someRight}\n\n");

print("Information:\n");
var_dump($someWrong);
print('Type: ' . gettype($someWrong) . PHP_EOL);
print("As string: {$someWrong}\n\n");

```

**Result (PHP 8.4)**:

```
Information:
bool(true)
Type: boolean
As string: 1

Information:
bool(false)
Type: boolean
As string:

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/bool.php)

## Booleans as singleton types

**`Singleton` types** are those which allow only one value. PHP has support for two *singleton types*: `false` as of PHP 8.0.0 and `true` as of PHP 8.2.0.

Warning

Prior to PHP 8.2.0 the `false` type could only be used as part of a *union type*.

Note: It is not possible to define *custom singleton types*. Consider using an *enumerations* instead.

-- [PHP Reference](https://www.php.net/manual/en/language.types.singleton.php)

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

*Example: Bool syntax and case sensitivity*

```php
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

```

**Result (PHP 8.4)**:

```
true: bool(true)
TRUE: bool(true)
True: bool(true)

false: bool(false)
FALSE: bool(false)
False: bool(false)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/bool_syntax.php)

## Usage

*Example: Comparison result use case*

```php
<?php

$input = "secret";
$password = "secret";
$isValid = ($input === $password);

if ($isValid) {
    echo "Access granted.\n";
}

```

**Result (PHP 8.4)**:

```
Access granted.
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/use_cases/bool_use_case_comparison_result.php)

*Example: Control structures use case*

```php
<?php

$isSunny = true;

if ($isSunny) {
    echo "Go outside!\n";
} else {
    echo "Stay indoors.\n";
}

```

**Result (PHP 8.4)**:

```
Go outside!
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/use_cases/bool_use_case_control_structures.php)

## Testing for `bool`

*Example: Testing for `bool`*

```php
<?php

$someRight = true;

print('Type of right: ' . gettype($someRight) . PHP_EOL);
print('Is bool? ' . (is_bool($someRight) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someWrong = false;

print('Type of wrong: ' . gettype($someWrong) . PHP_EOL);
print('Is bool? ' . (is_bool($someWrong) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is bool? ' . (is_null($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type of right: boolean
Is bool? yes

Type of wrong: boolean
Is bool? yes

Type of value: integer
Is bool? no

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/use_cases/bool_use_case_comparison_result.php)

## Logical context

```php
<?php

$age = 22;
$hasId = true;
$isCitizen = false;
$technologies = [
    'C++',
    'Java',
    'PHP',
    'Docker',
    'Git',
];

print("Age: {$age}, Has ID: " . ($hasId ? 'yes' : 'no') . ", Citizen: " . ($isCitizen ? 'yes' : 'no') . "\n");

if ($age >= 18 && $hasId) {
    print("Passed age and ID check.\n");
} else {
    print("Failed age or ID check.\n");
}

if (!$isCitizen || $age < 18) {
    print("Cannot vote due to citizenship or age.\n");
}

$status = ($age >= 18 && $isCitizen && $hasId) ? "Eligible" : "Ineligible";
print("Status: $status\n");

print("Skills:\n");

while($technology = current($technologies)) {
    print($technology . ' ');
    next($technologies);
}

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Age: 22, Has ID: yes, Citizen: no
Passed age and ID check.
Cannot vote due to citizenship or age.
Status: Ineligible
Skills:
C++ Java PHP Docker Git
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/logical_context.php)

*Example: Logical context and equal operator*

```php
<?php

$someAnswer = true;

if ($someAnswer == true) {
    print("That's true.\n");
}

if ($someAnswer) {
    print("You're right.\n");
}

```

**Result (PHP 8.4)**:

```
That's true.
You're right.
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/logical_context_and_equal_operator.php)

## Casting to `bool`

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

*Example: Casting to `bool`*

```php
<?php

$someNothing = null;
$nullToBool = (bool) $someNothing;
print("null to bool: ");
var_dump($nullToBool);

print(PHP_EOL);

$someNumber = 0;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = -0;
$intToBool = (bool) $someNumber;
print("-0 to bool: ");
var_dump($intToBool);

$someNumber = 1;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = -1;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = 3;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToBool = (bool) $someMeasure;
print("0.0 to bool: ");
var_dump($floatToBool);

$someMeasure = -0.0;
$floatToBool = (bool) $someMeasure;
print("-0.0 to bool: ");
var_dump($floatToBool);

$someMeasure = 0.1;
$floatToBool = (bool) $someMeasure;
print("{$someMeasure} to bool: ");
var_dump($floatToBool);

$someMeasure = 1.0;
$floatToBool = (bool) $someMeasure;
print("1.0 to bool: ");
var_dump($floatToBool);

$someMeasure = 3.0;
$floatToBool = (bool) $someMeasure;
print("3.0 to bool: ");
var_dump($floatToBool);

print(PHP_EOL);

$someText = "";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = " ";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "false";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "true";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "0";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "-0";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "1";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "-1";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "null";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "a";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

print(PHP_EOL);

$someCollection = [];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [true];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [false];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [0];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [1];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [''];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [null];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
null to bool: bool(false)

0 to bool: bool(false)
-0 to bool: bool(false)
1 to bool: bool(true)
-1 to bool: bool(true)
3 to bool: bool(true)

0.0 to bool: bool(false)
-0.0 to bool: bool(false)
0.1 to bool: bool(true)
1.0 to bool: bool(true)
3.0 to bool: bool(true)

"" to bool: bool(false)
" " to bool: bool(true)
"false" to bool: bool(true)
"true" to bool: bool(true)
"0" to bool: bool(false)
"-0" to bool: bool(true)
"1" to bool: bool(true)
"-1" to bool: bool(true)
"null" to bool: bool(true)
"a" to bool: bool(true)

[] to bool: bool(false)
[] to bool: bool(true)
[] to bool: bool(true)
[] to bool: bool(true)
[] to bool: bool(true)
[] to bool: bool(true)
[] to bool: bool(true)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/casting_to_bool.php)

## Casting from `bool`

```php
<?php

$someRight = true;
$someWrong = false;

$trueToInt = (int) $someRight;
print("True to int: ");
var_dump($trueToInt);
$falseToInt = (int) $someWrong;
print("False to int: ");
var_dump($falseToInt);
print(PHP_EOL);

$trueToFloat = (float) $someRight;
print("True to float: ");
var_dump($trueToFloat);
$falseToFloat = (float) $someWrong;
print("False to float: ");
var_dump($falseToFloat);
print(PHP_EOL);

$trueToString = (string) $someRight;
print("True to string: ");
var_dump($trueToString);
$falseToString = (string) $someWrong;
print("False to string: ");
var_dump($falseToString);
print(PHP_EOL);

$trueToArray = (array) $someRight;
print("True to array: ");
var_dump($trueToArray);
$falseToArray = (array) $someWrong;
print("False to array: ");
var_dump($falseToArray);
print(PHP_EOL);

$trueToObject = (object) $someRight;
print("True to object: ");
var_dump($trueToObject);
$falseToObject = (object) $someWrong;
print("False to object: ");
var_dump($falseToObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
True to int: int(1)
False to int: int(0)

True to float: float(1)
False to float: float(0)

True to string: string(1) "1"
False to string: string(0) ""

True to array: array(1) {
  [0]=>
  bool(true)
}
False to array: array(1) {
  [0]=>
  bool(false)
}

True to object: object(stdClass)#1 (1) {
  ["scalar"]=>
  bool(true)
}
False to object: object(stdClass)#2 (1) {
  ["scalar"]=>
  bool(false)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/casting_from_bool.php)

## Automatic conversion to `bool`

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

```

**Result (PHP 8.4)**:

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
$d = -0.0; // (double)
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

$s = ""; // empty string (string)
casted to false
$s = " "; // space (string)
casted to true
$s = "0"; // empty string (string)
casted to false
$s = "\0"; // null (\0) character (string)
casted to true
$s = "a"; // (string)
casted to true
$s = "false"; // (string)
casted to true
$s = "true"; // (string)
casted to true

$a = []; // (array)
casted to false
$a = [0]; // (array)
casted to true
$a = [null]; // (array)
casted to true

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/booleans/automatic_conversions_to_bool.php)

[▵ Up](#booleans)
[⌂ Home](../../../../../README.md)
[▲ Previous: Resources](../../special/resources/resources.md)
[▼ Next: Integers](../integers/integers.md)
