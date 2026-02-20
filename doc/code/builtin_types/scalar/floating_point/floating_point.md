[⌂ Home](../../../../../README.md)
[▲ Previous: Integers](../integers/integers.md)
[▼ Next: Strings](../strings/strings.md)

# Floating point

## Description

**Floating-point numbers** represent *numeric values* with *decimal digits*.

Floating-point numbers are often called *floats*, *doubles*, or *real numbers*. Like *integers*, the range of the floats depends on the platform where PHP runs.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-float/#introduction-to-the-php-float)

*Example: `float` type*

```php
<?php

$someValue = 3.0;
$otherValue = -9.2;

print("Information:\n");
var_dump($someValue);
print('Type: ' . gettype($someValue) . PHP_EOL);
print("As string: {$someValue}\n\n");

print("Information:\n");
var_dump($otherValue);
print('Type: ' . gettype($otherValue) . PHP_EOL);
print("As string: {$otherValue}\n\n");

```

**Result (PHP 8.4)**:

```
Information:
float(3)
Type: double
As string: 3

Information:
float(-9.2)
Type: double
As string: -9.2

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/float.php)

## Syntax

PHP recognizes *floating-point numbers* in the following common formats:

* `1.25`
* `3.14`
* `-0.1`

PHP also supports the *floating-point numbers* in *scientific notation*:

`0.125E1 // 0.125 * 10^1 or 1.25`

Since PHP 7.4, you can use the underscores in floats to make long numbers more readable. For example:

`1_234_457.89`

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-float/#introduction-to-the-php-float)

**Floating point numbers** (also known as *floats*, *doubles*, or *real numbers*) can be specified using any of the following syntaxes:

```php
<?php
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567; // as of PHP 7.4.0
?>
```

Formally as of PHP 7.4.0 (previously, underscores have not been allowed):

```
LNUM          [0-9]+(_[0-9]+)*
DNUM          ({LNUM}?"."{LNUM}) | ({LNUM}"."{LNUM}?)
EXPONENT_DNUM (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.float.php)

*Example: `float` syntax*

```php
<?php

$someValue= 10.5;
$somePositiveValue = +3.2;
$someNegativeValue = -9.3;
$someValueInUnderscoredNotation = 10_000_1024.0;
$someValueInScientificNotationWithPositiveExponent = 0.125e1;
$someValueInScientificNotationWithNegativeExponent = 5e-8;
$otherValueInScientificNotationWithPositiveExponent = 0.25E2;
$otherValueInScientificNotationWithNegativeExponent = 3E-6;

print("10.5: ");
var_dump($someValue);
print("+3.2: ");
var_dump($somePositiveValue);
print("-9.3: ");
var_dump($someNegativeValue);
print("10_000_1024.0: ");
var_dump($someValueInUnderscoredNotation);
print("0.125e1: ");
var_dump($someValueInScientificNotationWithPositiveExponent);
print("5e-8: ");
var_dump($someValueInScientificNotationWithNegativeExponent);
print("0.25E2: ");
var_dump($otherValueInScientificNotationWithPositiveExponent);
print("3E-6: ");
var_dump($otherValueInScientificNotationWithNegativeExponent);

```

**Result (PHP 8.4)**:

```
10.5: float(10.5)
+3.2: float(3.2)
-9.3: float(-9.3)
10_000_1024.0: float(100001024)
0.125e1: float(1.25)
5e-8: float(5.0E-8)
0.25E2: float(25)
3E-6: float(3.0E-6)
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/float_syntax.php)

*Example: Float exponential notation*

```php
<?php

$scientificNotationWithoutSign = 5e3;
print("5e3: ");
var_dump($scientificNotationWithoutSign);

$scientificNotationWithoutSign = 5E3;
print("5E3: ");
var_dump($scientificNotationWithoutSign);

print(PHP_EOL);

$scinetifictNotificationPlusSign = 5e+3;
print("5e+3: ");
var_dump($scinetifictNotificationPlusSign);

$scinetifictNotificationPlusSign = 5E+3;
print("5E+3: ");
var_dump($scinetifictNotificationPlusSign);

print(PHP_EOL);

$scientificNotificationMinusSign = 5e-3;
print("5e-3: ");
var_dump($scientificNotificationMinusSign);

$scientificNotificationMinusSign = 5E-3;
print("5E-3: ");
var_dump($scientificNotificationMinusSign);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
5e3: float(5000)
5E3: float(5000)

5e+3: float(5000)
5E+3: float(5000)

5e-3: float(0.005)
5E-3: float(0.005)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/float_exponential_notation.php)

## Size

The size of a `float` is platform-dependent, although a maximum of approximately `1.8e308` with a precision of roughly 14 decimal digits is a common value (the 64 bit IEEE format).

-- [PHP Reference](https://www.php.net/manual/en/language.types.float.php)

## Precision

Floating point numbers have *limited precision*. Although it depends on the system, PHP typically uses the IEEE 754 double precision format, which will give a maximum relative error due to rounding in the order of `1.11e-16`. Non elementary arithmetic operations may give larger errors, and, of course, error propagation must be considered when several operations are compounded.

Additionally, rational numbers that are exactly representable as *floating point* numbers in base 10, like `0.1` or `0.7`, do not have an exact representation as *floating point* numbers in base 2, which is used internally, no matter the size of the `mantissa`. Hence, they cannot be converted into their internal binary counterparts without a small loss of precision. This can lead to confusing results: for example, *floor((0.1+0.7)*10)* will usually return `7` instead of the expected `8`, since the internal representation will be something like `7.9999999999999991118...`.

So never trust *floating number* results to the last digit, and do not compare *floating point* numbers directly for equality. If higher precision is necessary, the arbitrary precision `math` functions and `gmp` functions are available.

-- [PHP Reference](https://www.php.net/manual/en/language.types.float.php)

## Number accuracy

Since the computer cannot represent exact floating-point numbers, it can only use approximate representations.

For example, the result of 0.1 + 0.1 + 0.1 is 0.299999999…, not 0.3. When comparing two floating-point numbers using the == operator, you must be careful.

The following example returns false, which may not be what you expected:

```php
<?php

$total = 0.1 + 0.1 + 0.1;
echo $total == 0.3; // return false
```

-- [PHP tutorial](https://www.phptutorial.net/php-tutorial/php-float/#floating-point-number-accuracy)

## Values range

```php
<?php

print "The largest float supported: PHP_FLOAT_MAX = " . PHP_FLOAT_MAX . " (" . gettype(PHP_FLOAT_MAX) . ")\n";
$bigger = PHP_FLOAT_MAX + 1;
print "Bigger than maximal float: PHP_FLOAT_MAX + 1 = {$bigger} (" . gettype($bigger) . ")\n\n";
print "The smallest float supported: PHP_FLOAT_MIN = " . PHP_FLOAT_MIN . " (" . gettype(PHP_FLOAT_MIN) . ")\n";
$smaller = PHP_FLOAT_MIN - 1;
print "Smaller than minimal float: PHP_FLOAT_MIN - 1 = {$smaller} (" . gettype($smaller) . ")\n\n";
print "Number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = " . PHP_FLOAT_DIG . " (" . gettype(PHP_FLOAT_DIG) . ")\n\n";
print "Smallest representable positive number x, so that x + 1.0 != 1.0" . PHP_FLOAT_EPSILON . " (" . gettype(PHP_FLOAT_EPSILON) . ")\n\n";

```

**Result (PHP 8.4)**:

```
The largest float supported: PHP_FLOAT_MAX = 1.7976931348623E+308 (double)
Bigger than maximal float: PHP_FLOAT_MAX + 1 = 1.7976931348623E+308 (double)

The smallest float supported: PHP_FLOAT_MIN = 2.2250738585072E-308 (double)
Smaller than minimal float: PHP_FLOAT_MIN - 1 = -1 (double)

Number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = 15 (integer)

Smallest representable positive number x, so that x + 1.0 != 1.02.2204460492503E-16 (double)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/float_values_range.php)

## Usage

*Example: Measure use case*

```php
<?php

$priceInDolars = 19.99;
print("Price: \${$priceInDolars}\n");

$temperatureInDegreeCelsius = -3.5;
print("Temperature: {$temperatureInDegreeCelsius} °C\n");

$distanceInKilometers = 1.2e3;
print("Distance: {$distanceInKilometers} km\n");

```

**Result (PHP 8.4)**:

```
Price: $19.99
Temperature: -3.5 °C
Distance: 1200 km
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/use_cases/float_use_case_measure.php)

*Example: Calculation use case*

```php
<?php

$a = 5.5;
$b = 2.2;

echo "Sum: " . ($a + $b) . "\n";
echo "Product: " . ($a * $b) . "\n";
echo "Circle area (r=5.5): " . (M_PI * $a * $a) . "\n";

```

**Result (PHP 8.4)**:

```
Sum: 7.7
Product: 12.1
Circle area (r=5.5): 95.033177771091
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/use_cases/float_use_case_calculation.php)

## Testing for `float`

To check if a value is a *floating-point number*, you use the `is_float()` or `is_real()` function. The `is_float()` returns `true` if its argument is a *floating-point number*; otherwise, it returns `false`. For example:

```php
<?php

echo is_float(0.5);
```

Output:

```
1
```

*Example: Testing for `float`*

```php
<?php

$someValue = 10.0;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is float? ' . (is_float($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is float? ' . (is_double($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is float? ' . (is_float($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is float? ' . (is_double($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type of value: double
Is float? yes
Is float? yes

Type of number: integer
Is float? no
Is float? no

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/testing_for_float.php)

## Comparing floats

As noted in the warning above, *testing floating point values for equality is problematic*, due to the way that they are represented internally. However, there are ways to make comparisons of floating point values that work around these limitations.

To test floating point values for equality, an upper bound on the relative error due to rounding is used. This value is known as the *machine epsilon*, or *unit roundoff*, and is the smallest acceptable difference in calculations.

`$a` and `$b` are equal to `5` digits of precision.

*Example: Comparing floats*

```php
<?php
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if (abs($a - $b) < $epsilon) {
    echo "true";
}
?>
```

## `NaN`

Some *numeric operations* can result in a value represented by the *constant* `NAN`. This result represents an undefined or unrepresentable value in floating-point calculations. Any loose or strict comparisons of this value against any other value, including itself, but except `true`, will have a result of `false`.

Because `NAN` represents any number of different values, `NAN` should not be compared to other values, including itself, and instead should be checked for using `is_nan()`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.float.php)

*Example: NaN*

```php
<?php

$notANumber = acos(2);

print("acos(2) value: {$notANumber} (" . gettype($notANumber) . ")\n");
print("Not a number: " . (is_nan($notANumber) ? 'yes' : 'no') . "\n");

```

**Result (PHP 8.4)**:

```
acos(2) value: NAN (double)
Not a number: yes
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/nan.php)

## Infinity

```php
<?php

$positiveInfinity = 1.9e411;
print("1.9e411: {$positiveInfinity} (" . gettype($positiveInfinity) . ")\n");
print("Is {$positiveInfinity} finite? " . (is_finite($positiveInfinity) ? 'yes' : 'no') . PHP_EOL);
print("Is {$positiveInfinity} inifinite? " . (is_infinite($positiveInfinity) ? 'yes' : 'no') . PHP_EOL);
$bigger = $positiveInfinity + 1;
print("1.9e411 + 1: {$bigger} (" . gettype($bigger) . ")\n");

print PHP_EOL;

$negativeInfinity = -1.9e411;
print "-1.9e411; // {$negativeInfinity} (" . gettype($negativeInfinity) . ")\n";
print("Is {$negativeInfinity} finite? " . (is_finite($negativeInfinity) ? 'yes' : 'no') . PHP_EOL);
print("Is {$negativeInfinity} inifinite? " . (is_infinite($negativeInfinity) ? 'yes' : 'no') . PHP_EOL);
$smaller = $negativeInfinity - 1;
print("-1.9e411 - 1: {$smaller} (" . gettype($smaller) . ")\n");

print PHP_EOL;

```

**Result (PHP 8.4)**:

```
1.9e411: INF (double)
Is INF finite? no
Is INF inifinite? yes
1.9e411 + 1: INF (double)

-1.9e411; // -INF (double)
Is -INF finite? no
Is -INF inifinite? yes
-1.9e411 - 1: -INF (double)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/infinity.php)

## Casting to `float`

### From strings

If the *string* is *numeric* or *leading numeric* then it will resolve to the corresponding *float value*, otherwise it is converted to zero (`0`).

### From other types

For values of other *types*, the conversion is performed by converting the value to `int` first and then to `float`.

Note:

As certain types have undefined behavior when converting to `int`, this is also the case when converting to `float`.

*Example: Casting to `float`*

```php
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

```

**Result (PHP 8.4)**:

```
null to float: float(0)

true to float: float(1)
false to float: float(0)

0 to float: float(0)
1 to float: float(1)
3 to float: float(3)
-3 to float: float(-3)

"" to float: float(0)
" " to float: float(0)
"false" to float: float(0)
"true" to float: float(0)
"0" to float: float(0)
"1" to float: float(1)
"3" to float: float(3)
"-3" to float: float(-3)
"3.6" to float: float(3.6)
"-3.6" to float: float(-3.6)
"null" to float: float(0)
"a" to float: float(0)
"three" to float: float(0)

[] to float: float(0)
[true] to float: float(1)
[false] to float: float(1)
[0] to float: float(1)
[1] to float: float(1)
[''] to float: float(1)
[null] to float: float(1)
[null, true, 2] to float: float(1)
[1, 2, 3] to float: float(1)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/casting_to_float.php)

## Casting from `float`

```php
<?php

$zero = 0.0;
$somePositive = 5.1;
$someNegative = -5.1;

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
Positive to float: float(5.1)
Negative to float: float(-5.1)

Zero to string: string(1) "0"
Positive to string: string(3) "5.1"
Negative to string: string(4) "-5.1"

Zero to array: array(1) {
  [0]=>
  float(0)
}
Positive to array: array(1) {
  [0]=>
  float(5.1)
}
Negative to array: array(1) {
  [0]=>
  float(-5.1)
}

Zero to object: object(stdClass)#1 (1) {
  ["scalar"]=>
  float(0)
}
Positive to object: object(stdClass)#2 (1) {
  ["scalar"]=>
  float(5.1)
}
Negative to object: object(stdClass)#3 (1) {
  ["scalar"]=>
  float(-5.1)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/floating_point/casting_from_float.php)

[▵ Up](#floating-point)
[⌂ Home](../../../README.md)
[▲ Previous: Integers](../integers/integers.md)
[▼ Next: Strings](../strings/strings.md)
