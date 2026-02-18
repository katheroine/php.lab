[⌂ Home](../../../../../README.md)
[▲ Previous: Booleans](../booleans/booleans.md)
[▼ Next: Floating point](../floating_point/floating_point.md)

# Integers

## Description

An `int` is a number of the set `ℤ = {..., -2, -1, 0, 1, 2, ...}`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.integer.php)

Integers are whole numbers such as `-3`, `-2`, `-1`, `0`, `1`, `2`, `3`... PHP uses the int type to represent the integers.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-int/#introduction-to-the-php-int-type)

*Example: `int` type*

```php
<?php

$someNumber = 3;
$otherNumber = -9;

print("Information:\n");
var_dump($someNumber);
print('Type: ' . gettype($someNumber) . PHP_EOL);
print("As string: {$someNumber}\n\n");

print("Information:\n");
var_dump($otherNumber);
print('Type: ' . gettype($otherNumber) . PHP_EOL);
print("As string: {$otherNumber}\n\n");

```

**Result (PHP 8.4)**:

```
Information:
int(3)
Type: integer
As string: 3

Information:
int(-9)
Type: integer
As string: -9

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/int.php)

## Syntax

**Ints** can be specified in *decimal* (`base 10`), *hexadecimal* (`base 16`), *octal* (`base 8`) or *binary* (`base 2`) notation. The *negation operator* can be used to denote a negative `int`.

To use *octal notation*, precede the number with a `0` (zero). As of PHP 8.1.0, octal notation can also be preceded with `0o` or `0O`. To use *hexadecimal notation* precede the number with `0x`. To use *binary notation* precede the number with `0b`.

As of PHP 7.4.0, *integer literals* may contain underscores (`_`) between digits, for better readability of literals. These underscores are removed by PHP's scanner.

*Example: Integer literals*

```php
<?php
$a = 1234; // decimal number
$a = 0123; // octal number (equivalent to 83 decimal)
$a = 0o123; // octal number (as of PHP 8.1.0)
$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$a = 0b11111111; // binary number (equivalent to 255 decimal)
$a = 1_234_567; // decimal number (as of PHP 7.4.0)
?>
```

*Example: `int` syntax*

```php
<?php

$someNumber = 10;
$otherNumber = +3;
$anotherNumber = -9;
$yetAnotherNumber = 10_000_1024;

print("10: ");
var_dump($someNumber);
print("+3: ");
var_dump($otherNumber);
print("-9: ");
var_dump($anotherNumber);
print("10_000_1024: ");
var_dump($yetAnotherNumber);

print(PHP_EOL);

$someBinary = 0b1111;
$otherBinary = 0B1111;

print("0b1111: ");
var_dump($someBinary);
print("0B1111: ");
var_dump($otherBinary);

print(PHP_EOL);

$someOctal = 017;
$otherOctal = 0o17;
$anotherOctal = 0O17;

print("017: ");
var_dump($someOctal);
print("0o17: ");
var_dump($otherOctal);
print("0O17: ");
var_dump($anotherOctal);

print(PHP_EOL);

$someDecimal = 15;

print("15: ");
var_dump($someDecimal);

print(PHP_EOL);

$someHaxadecimal = 0xf;
$otherHexadecimal = 0Xf;
$anotherHexadecimal = 0xF;
$yetAnotherHexadecimal = 0XF;

print("0xf: ");
var_dump($someHaxadecimal);
print("0Xf: ");
var_dump($otherHexadecimal);
print("0xF: ");
var_dump($anotherHexadecimal);
print("0XF:");
var_dump($yetAnotherHexadecimal);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
10: int(10)
+3: int(3)
-9: int(-9)
10_000_1024: int(100001024)

0b1111: int(15)
0B1111: int(15)

017: int(15)
0o17: int(15)
0O17: int(15)

15: int(15)

0xf: int(15)
0Xf: int(15)
0xF: int(15)
0XF:int(15)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/int_syntax.php)

Formally, the structure for *`int` literals* is as of PHP 8.1.0 (previously, the `0o` or `0O` octal prefixes were not allowed, and prior to PHP 7.4.0 the underscores were not allowed):

```
decimal     : [1-9][0-9]*(_[0-9]+)*
            | 0

hexadecimal : 0[xX][0-9a-fA-F]+(_[0-9a-fA-F]+)*

octal       : 0[oO]?[0-7]+(_[0-7]+)*

binary      : 0[bB][01]+(_[01]+)*

integer     : decimal
            | hexadecimal
            | octal
            | binary
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.integer.php)

### Decimal numbers

PHP uses a sequence of digits without leading zeros to represent *decimal values*. The sequence may begin with a plus or minus sign. If it has no sign, then the integer is positive. For example:

* `2000`
* `-100`
* `12345`

From PHP 7.4, you can use the underscores (`_`) to group digits in an integer to make it easier to read. For example, instead of using the following number:

`1000000`

you can use the underscores (`_`) to group digits like this:

`1_000_000`

### Octal numbers

*Octal numbers* consist of a leading zero and a sequence of digits from `0` to `7`. Like decimal numbers, octal numbers can have a plus (`+`) or minus (`-`) sign. For example:

* `+010 // decimal 8`

### Hexadecimal numbers

*Hexadecimal numbers* consist of a leading `0x` and a sequence of digits (`0-9`) or letters (`A-F`). The letters can be lowercase or uppercase. By convention, letters are written in uppercase.

Like decimal numbers, hexadecimal numbers can include a sign, plus (`+`) or minus(`-`). For example:

* `0x10 // decimal 16`
* `0xFF // decimal 255`

### Binary numbers

*Binary numbers* begin with `0b` are followed by a sequence of digits `0` and `1`. The binary numbers can include a sign. For example:

* `0b10 // decimal 2`

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-int/#introduction-to-the-php-int-type)

*Example: Int in binary, octal, decimal and hexagonal notation*

```php
<?php

// Binary

print("0b1111: " . 0b1111 . PHP_EOL);
print("0B1111: " . 0B1111 . PHP_EOL);

print(PHP_EOL);

// Octal
print("017: " . 017 . PHP_EOL);
print("0o17: " . 0o17 . PHP_EOL);
print("0O17: " . 0O17 . PHP_EOL);

print(PHP_EOL);

// Decimal
print("15: " . 15 . PHP_EOL);

print(PHP_EOL);

// Hexadecimal
print("0xf: " . 0xf . PHP_EOL);
print("0Xf: " . 0Xf . PHP_EOL);
print("0xF: " . 0xF . PHP_EOL);
print("0XF: " . 0XF . PHP_EOL);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
0b1111: 15
0B1111: 15

017: 15
0o17: 15
0O17: 15

15: 15

0xf: 15
0Xf: 15
0xF: 15
0XF: 15

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/int_bin_oct_dec_hex_notation.php)

## Values range

The range of integers depends on the platform where PHP runs. Typically, integers has a range from `-2,147,438,648` to `2,147,483,647`. It’s equivalent to `32 bits signed`.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-int/#introduction-to-the-php-int-type)

The size of an `int` is platform-dependent, although a maximum value of about two billion is the usual value (that's 32 bits signed). 64-bit platforms usually have a maximum value of about `9E18`. PHP does not support *unsigned ints*. `int` size can be determined using the constant `PHP_INT_SIZE`, maximum value using the constant `PHP_INT_MAX`, and minimum value using the constant `PHP_INT_MIN`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.integer.php)

*Example: Int values range*

```php
<?php

print "The largest integer supported: PHP_INT_MAX = " . PHP_INT_MAX . " (" . gettype(PHP_INT_MAX) . ")\n";
$bigger = PHP_INT_MAX + 1;
print "Bigger than maximal integer: PHP_INT_MAX + 1 = {$bigger} (" . gettype($bigger) . ")\n\n";
print "The smallest integer supported: PHP_INT_MIN = " . PHP_INT_MIN . " (" . gettype(PHP_INT_MIN) . ")\n";
$smaller = PHP_INT_MIN - 1;
print "Smaller than minimal integer: PHP_INT_MIN - 1 = {$smaller} (" . gettype($smaller) . ")\n\n";
print "The size of an integer in bytes: PHP_INT_SIZE = " . PHP_INT_SIZE . " (" . gettype(PHP_INT_SIZE) . ")\n\n";

```

**Result (PHP 8.4)**:

```
The largest integer supported: PHP_INT_MAX = 9223372036854775807 (integer)
Bigger than maximal integer: PHP_INT_MAX + 1 = 9.2233720368548E+18 (double)

The smallest integer supported: PHP_INT_MIN = -9223372036854775808 (integer)
Smaller than minimal integer: PHP_INT_MIN - 1 = -9.2233720368548E+18 (double)

The size of an integer in bytes: PHP_INT_SIZE = 8 (integer)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/int_values_range.php)

### Integer overflow

If PHP encounters a number beyond the bounds of the *`int` type*, it will be interpreted as a `float` instead. Also, an operation which results in a number beyond the bounds of the `int` type will return a `float` instead.

*Example: Integer overflow*

```php
<?php
$large_number = 50000000000000000000;
var_dump($large_number);         // float(5.0E+19)

var_dump(PHP_INT_MAX + 1);       // 32-bit system: float(2147483648)
                                 // 64-bit system: float(9.2233720368548E+18)
?>
```

## Usage

*Example: Quantity use case*

```php
<?php

$skills = [
    'HTML + CSS',
    'JavaScript (client side)',
    'PHP',
    'Python',
    'MySQL / MariaDB',
    'SQLite',
    'PostgreSQL',
    'MongoDB',
    'Redis',
    'RabbitMQ',
    'Docker',
    'Linux',
    'Git',
    'SOLID',
    'TDD',
    'Design patterns',
    'DDD',
    'Hexagonal Architecture',
    'CQRS',
    'REST',
    'Symfony',
];

$skillsNumber = count($skills);

print("Developer has {$skillsNumber} skills.\n");

```

**Result (PHP 8.4)**:

```
Developer has 21 skills.
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/use_cases/int_use_case_quantity.php)

*Example: Index use case*

```php
<?php

$roles = [
    'PHP backend developer with Symfony',
    'JavaScript frontend developer with React',
    'Automatic tester with Python',
    'Manual tester',
    'DevOps engineer with AWS',
];

$rolesNumber = count($roles);

for ($i = 0; $i < $rolesNumber; $i++) {
    print('Role no. ' . ($i + 1) . ': ' . $roles[$i] . PHP_EOL);
}

```

**Result (PHP 8.4)**:

```
Role no. 1: PHP backend developer with Symfony
Role no. 2: JavaScript frontend developer with React
Role no. 3: Automatic tester with Python
Role no. 4: Manual tester
Role no. 5: DevOps engineer with AWS
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/use_cases/int_use_case_index.php)

## Testing for `int`

```php
<?php

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is int? ' . (is_int($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_integer($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_long($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10.0;

print('Type of number: ' . gettype($someValue) . PHP_EOL);
print('Is int? ' . (is_int($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_integer($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_long($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type of number: integer
Is int? yes
Is int? yes
Is int? yes

Type of number: double
Is int? no
Is int? no
Is int? no

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/testing_for_int.php)

## Integer division

There is no `int` division operator in PHP, to achieve this use the `intdiv()` function. `1/2` yields the `float` `0.5`. The value can be cast to an `int` to round it towards zero, or the `round()` function provides finer control over rounding.

*Example: Divisions*

```php
<?php
var_dump(25/7);         // float(3.5714285714286)
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4)
?>
```

## Casting to `int`

To explicitly convert a value to `int`, use either the `(int)` or `(integer)` casts. However, in most cases the cast is not needed, since a value will be automatically converted if an operator, function or control structure requires an `int` argument. A value can also be converted to `int` with the `intval()` function.

If a resource is converted to an `int`, then the result will be the unique resource number assigned to the resource by PHP at runtime.

### From booleans

`false` will yield `0` (zero), and `true` will yield `1` (one).

### From floating point numbers

When converting from `float` to `int`, the number will be rounded towards zero. As of PHP 8.1.0, a deprecation notice is emitted when implicitly converting a non-integral `float` to `int` which loses precision.

*Example: Casting from `float`*

```php
<?php

function foo($value): int {
  return $value;
}

var_dump(foo(8.1)); // "Deprecated: Implicit conversion from float 8.1 to int loses precision" as of PHP 8.1.0
var_dump(foo(8.1)); // 8 prior to PHP 8.1.0
var_dump(foo(8.0)); // 8 in both cases

var_dump((int) 8.1); // 8 in both cases
var_dump(intval(8.1)); // 8 in both cases
?>
```

If the `float` is beyond the boundaries of `int` (usually `+/- 2.15e+9 = 2^31` on 32-bit platforms and `+/- 9.22e+18 = 2^63` on 64-bit platforms), the result is `undefined`, since the `float` doesn't have enough precision to give an exact `int` result. No warning, not even a notice will be issued when this happens!

Note:

`NaN`, `Inf` and `-Inf` will always be zero when cast to `int`.

Warning

Never cast an unknown fraction to `int`, as this can sometimes lead to unexpected results.

```php
<?php
echo (int) ( (0.1+0.7) * 10 ); // echoes 7!
?>
```

### From strings

If the `string` is numeric or leading numeric then it will resolve to the corresponding integer value, otherwise it is converted to zero (`0`).

### From NULL

`null` is always converted to zero (`0`).

### From other types

Caution

The behaviour of converting to `int` is `undefined` for other types. Do not rely on any observed behaviour, as it can change without notice.

-- [PHP Reference](https://www.php.net/manual/en/language.types.integer.php)

*Example: Casting to `int`*

```php
<?php

$someNothing = null;
$nullToInt = (int) $someNothing;
print("null to int: ");
var_dump($nullToInt);

print(PHP_EOL);

$someRight = true;
$intToInt = (int) $someRight;
print("true to int: ");
var_dump($intToInt);

$someWrong = false;
$intToInt = (int) $someWrong;
print("false to int: ");
var_dump($intToInt);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToInt = (int) $someMeasure;
print("0.0 to int: ");
var_dump($floatToInt);

$someMeasure = 0.1;
$floatToInt = (int) $someMeasure;
print("{$someMeasure} to int: ");
var_dump($floatToInt);

$someMeasure = 0.6;
$floatToInt = (int) $someMeasure;
print("{$someMeasure} to int: ");
var_dump($floatToInt);

$someMeasure = 1.0;
$floatToInt = (int) $someMeasure;
print("1.0 to int: ");
var_dump($floatToInt);

$someMeasure = 3.0;
$floatToInt = (int) $someMeasure;
print("3.0 to int: ");
var_dump($floatToInt);

$someMeasure = -3.0;
$floatToInt = (int) $someMeasure;
print("-3.0 to int: ");
var_dump($floatToInt);

print(PHP_EOL);

$someText = "";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = " ";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "false";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "true";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "0";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "1";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "3";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "-3";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "3.6";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "-3.6";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "null";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "a";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "three";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

print(PHP_EOL);

$someCollection = [];
$arrayToInt = (int) $someCollection;
print("[] to int: ");
var_dump($arrayToInt);

$someCollection = [true];
$arrayToInt = (int) $someCollection;
print("[true] to int: ");
var_dump($arrayToInt);

$someCollection = [false];
$arrayToInt = (int) $someCollection;
print("[false] to int: ");
var_dump($arrayToInt);

$someCollection = [0];
$arrayToInt = (int) $someCollection;
print("[0] to int: ");
var_dump($arrayToInt);

$someCollection = [1];
$arrayToInt = (int) $someCollection;
print("[1] to int: ");
var_dump($arrayToInt);

$someCollection = [''];
$arrayToInt = (int) $someCollection;
print("[''] to int: ");
var_dump($arrayToInt);

$someCollection = [null];
$arrayToInt = (int) $someCollection;
print("[null] to int: ");
var_dump($arrayToInt);

$someCollection = [null, true, 2];
$arrayToInt = (int) $someCollection;
print("[null, true, 2] to int: ");
var_dump($arrayToInt);

$someCollection = [null, true, 2];
$arrayToInt = (int) $someCollection;
print("[1, 2, 3] to int: ");
var_dump($arrayToInt);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
null to int: int(0)

true to int: int(1)
false to int: int(0)

0.0 to int: int(0)
0.1 to int: int(0)
0.6 to int: int(0)
1.0 to int: int(1)
3.0 to int: int(3)
-3.0 to int: int(-3)

"" to int: int(0)
" " to int: int(0)
"false" to int: int(0)
"true" to int: int(0)
"0" to int: int(0)
"1" to int: int(1)
"3" to int: int(3)
"-3" to int: int(-3)
"3.6" to int: int(3)
"-3.6" to int: int(-3)
"null" to int: int(0)
"a" to int: int(0)
"three" to int: int(0)

[] to int: int(0)
[true] to int: int(1)
[false] to int: int(1)
[0] to int: int(1)
[1] to int: int(1)
[''] to int: int(1)
[null] to int: int(1)
[null, true, 2] to int: int(1)
[1, 2, 3] to int: int(1)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/casting_to_int.php)

## Casting from `int`

*Example: Casting from `int`*

```php
<?php

$zero = 0;
$somePositive = 5;
$someNegative = -5;

$zeroToBool = (bool) $zero;
print("Zero to bool: ");
var_dump($zeroToBool);
$positiveToBool = (bool) $somePositive;
print("Positive to bool: ");
var_dump($positiveToBool);
$negativeToBool = (bool) $someNegative;
print("Negative to bool: ");
var_dump($negativeToBool);
print(PHP_EOL);

$zeroToFloat = (float) $zero;
print("Zero to float: ");
var_dump($zeroToFloat);
$positiveToFloat = (float) $somePositive;
print("Positive to float: ");
var_dump($positiveToFloat);
$negativeToFloat = (float) $someNegative;
print("Negative to float: ");
var_dump($negativeToFloat);
print(PHP_EOL);

$zeroToString = (string) $zero;
print("Zero to string: ");
var_dump($zeroToString);
$positiveToString = (string) $somePositive;
print("Positive to string: ");
var_dump($positiveToString);
$negativeToString = (string) $someNegative;
print("Negative to string: ");
var_dump($negativeToString);
print(PHP_EOL);

$zeroToArray = (array) $zero;
print("Zero to array: ");
var_dump($zeroToArray);
$positiveToArray = (array) $somePositive;
print("Positive to array: ");
var_dump($positiveToArray);
$negativeToArray = (array) $someNegative;
print("Negative to array: ");
var_dump($negativeToArray);
print(PHP_EOL);

$zeroToObject = (object) $zero;
print("Zero to object: ");
var_dump($zeroToObject);
$positiveToObject = (object) $somePositive;
print("Positive to object: ");
var_dump($positiveToObject);
$negativeToObject = (object) $someNegative;
print("Negative to object: ");
var_dump($negativeToObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Zero to bool: bool(false)
Positive to bool: bool(true)
Negative to bool: bool(true)

Zero to float: float(0)
Positive to float: float(5)
Negative to float: float(-5)

Zero to string: string(1) "0"
Positive to string: string(1) "5"
Negative to string: string(2) "-5"

Zero to array: array(1) {
  [0]=>
  int(0)
}
Positive to array: array(1) {
  [0]=>
  int(5)
}
Negative to array: array(1) {
  [0]=>
  int(-5)
}

Zero to object: object(stdClass)#1 (1) {
  ["scalar"]=>
  int(0)
}
Positive to object: object(stdClass)#2 (1) {
  ["scalar"]=>
  int(5)
}
Negative to object: object(stdClass)#3 (1) {
  ["scalar"]=>
  int(-5)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/integers/casting_from_int.php)

[▵ Up](#integers)
[⌂ Home](../../../../../README.md)
[▲ Previous: Booleans](../booleans/booleans.md)
[▼ Next: Floating point](../floating_point/floating_point.md)
