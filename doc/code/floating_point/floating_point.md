[⌂ Home](../../../README.md)
[▲ Previous: Integers](../integers/integers.md)
[▼ Next: Strings](../strings/strings.md)

# Floating point

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

The size of a `float` is platform-dependent, although a maximum of approximately `1.8e308` with a precision of roughly 14 decimal digits is a common value (the 64 bit IEEE format).

Warning

## Floating point precision

Floating point numbers have *limited precision*. Although it depends on the system, PHP typically uses the IEEE 754 double precision format, which will give a maximum relative error due to rounding in the order of `1.11e-16`. Non elementary arithmetic operations may give larger errors, and, of course, error propagation must be considered when several operations are compounded.

Additionally, rational numbers that are exactly representable as *floating point* numbers in base 10, like `0.1` or `0.7`, do not have an exact representation as *floating point* numbers in base 2, which is used internally, no matter the size of the mantissa. Hence, they cannot be converted into their internal binary counterparts without a small loss of precision. This can lead to confusing results: for example, *floor((0.1+0.7)*10)* will usually return `7` instead of the expected `8`, since the internal representation will be something like `7.9999999999999991118...`.

So never trust *floating number* results to the last digit, and do not compare *floating point* numbers directly for equality. If higher precision is necessary, the arbitrary precision `math` functions and `gmp` functions are available.

## Converting to float

### From strings

If the string is numeric or leading numeric then it will resolve to the corresponding float value, otherwise it is converted to zero (0).

### From other types

For values of other types, the conversion is performed by converting the value to `int` first and then to `float`.

Note:

As certain types have undefined behavior when converting to `int`, this is also the case when converting to `float`.

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

Some numeric operations can result in a value represented by the constant `NAN`. This result represents an undefined or unrepresentable value in floating-point calculations. Any loose or strict comparisons of this value against any other value, including itself, but except `true`, will have a result of `false`.

Because `NAN` represents any number of different values, `NAN` should not be compared to other values, including itself, and instead should be checked for using `is_nan()`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.float.php)

## Examples

*Example: Basic `float` usage*

```php
<?php

$someValue = 3.0;
$otherValue = -9.2;

print("Some value: {$someValue}\n");
var_dump($someValue);

print("Other value: {$otherValue}\n");
var_dump($otherValue);

```

**View**:
[Example](../../../example/code/floating_point/float.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Some value: 3
float(3)
Other value: -9.2
float(-9.2)
```

*Example: Checking if a value is floating point*

```php
<?php

// is_float:
print "is_float(0): " . is_float(0) . "\n";
print "is_float(1): " . is_float(1) . "\n";
print "is_float(-1): " . is_float(-1) . "\n";
print "is_float(1.0): " . is_float(1.0) . "\n";
print "is_float(-1.0): " . is_float(-1.0) . "\n";
print "is_float(1.1): " . is_float(1.1) . "\n";
print "is_float(-1.1): " . is_float(-1.1) . "\n";
print "is_float(1.9e411): " . is_float(1.9e411) . " // infinity\n";
print "is_float(-1.9e411): " . is_float(-1.9e411) . " // -infinity\n";
print "is_float(acos(2)): " . is_float(acos(2)) . " // not-a-number\n";
print "is_float(null): " . is_float(null) . "\n";
print "is_float('1.1'): " . is_float('1.1') . "\n";

print(PHP_EOL);

// is_float alias:
print "is_double(0): " . is_double(0) . "\n";
print "is_double(1): " . is_double(1) . "\n";
print "is_double(-1): " . is_double(-1) . "\n";
print "is_double(1.0): " . is_double(1.0) . "\n";
print "is_double(-1.0): " . is_double(-1.0) . "\n";
print "is_double(1.1): " . is_double(1.1) . "\n";
print "is_double(-1.1): " . is_double(-1.1) . "\n";
print "is_double(1.9e411): " . is_double(1.9e411) . " // infinity\n";
print "is_double(-1.9e411): " . is_double(-1.9e411) . " // -infinity\n";
print "is_double(acos(2)): " . is_double(acos(2)) . " // not-a-number\n";
print "is_double(null): " . is_double(null) . "\n";
print "is_double('1.1'): " . is_double('1.1') . "\n";

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/floating_point/checking_if_is_floating_point.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
is_float(0):
is_float(1):
is_float(-1):
is_float(1.0): 1
is_float(-1.0): 1
is_float(1.1): 1
is_float(-1.1): 1
is_float(1.9e411): 1 // infinity
is_float(-1.9e411): 1 // -infinity
is_float(acos(2)): 1 // not-a-number
is_float(null):
is_float('1.1'):

is_double(0):
is_double(1):
is_double(-1):
is_double(1.0): 1
is_double(-1.0): 1
is_double(1.1): 1
is_double(-1.1): 1
is_double(1.9e411): 1 // infinity
is_double(-1.9e411): 1 // -infinity
is_double(acos(2)): 1 // not-a-number
is_double(null):
is_double('1.1'):

```

*Example: Floating point value limits*

```php
<?php

print "The largest (positive) floating point supported: PHP_FLOAT_MAX = " . PHP_FLOAT_MAX . " (" . gettype(PHP_FLOAT_MAX) . ")\n";
$f = PHP_FLOAT_MAX + 0.1;
print "Trying to make bigger than maximal floating point: PHP_FLOAT_MAX + 0.1 = $f (" . gettype($f) . ")\n\n";
print "The smallest (positive) floating point supported: PHP_FLOAT_MIN = " . PHP_FLOAT_MIN . " (" . gettype(PHP_FLOAT_MIN) . ")\n";
$f = PHP_FLOAT_MIN - 0.1;
print "Trying to make smaller than minimal floating point: PHP_FLOAT_MIN - 0.1 = $f (" . gettype($f) . ")\n\n";
print "The number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = " . PHP_FLOAT_DIG . " (" . gettype(PHP_FLOAT_DIG) . ")\n\n";
print "The smallest representable positive number x, so that x + 1.0 != 1.0: PHP_FLOAT_EPSILON = " . PHP_FLOAT_EPSILON . " (" . gettype(PHP_FLOAT_EPSILON) . ")\n\n";

```

**View**:
[Example](../../../example/code/floating_point/floating_point_value_limits.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
The largest (positive) floating point supported: PHP_FLOAT_MAX = 1.7976931348623E+308 (double)
Trying to make bigger than maximal floating point: PHP_FLOAT_MAX + 0.1 = 1.7976931348623E+308 (double)

The smallest (positive) floating point supported: PHP_FLOAT_MIN = 2.2250738585072E-308 (double)
Trying to make smaller than minimal floating point: PHP_FLOAT_MIN - 0.1 = -0.1 (double)

The number of decimal digits that can be rounded into a float and back without precision loss: PHP_FLOAT_DIG = 15 (integer)

The smallest representable positive number x, so that x + 1.0 != 1.0: PHP_FLOAT_EPSILON = 2.2204460492503E-16 (double)

```

*Example: Floating point and infinity*

```php
<?php

$positive_infinity = 1.9e411;
print "\$positive_infinity = 1.9e411; // {$positive_infinity} (" . gettype($positive_infinity) . ")\n";

$negative_infinity = -1.9e411;
print "\$negative_infinity = 1.9e411; // {$negative_infinity} (" . gettype($negative_infinity) . ")\n";

print PHP_EOL;

print "is_finite($positive_infinity): " . is_finite($positive_infinity) . "\n";
print "is_infinite($positive_infinity): " . is_infinite($positive_infinity) . "\n";

print "is_finite($negative_infinity): " . is_finite($negative_infinity) . "\n";
print "is_infinite($negative_infinity): " . is_infinite($negative_infinity) . "\n";

print PHP_EOL;

```

**View**:
[Example](../../../example/code/floating_point/infinity.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
$positive_infinity = 1.9e411; // INF (double)
$negative_infinity = 1.9e411; // -INF (double)

is_finite(INF):
is_infinite(INF): 1
is_finite(-INF):
is_infinite(-INF): 1

```

*Example: Floating point becoming not a number*

```php
<?php

$not_a_number = acos(2);
print "\$not_a_number = acos(2); // {$not_a_number} (" . gettype($not_a_number) . ")\n";

print PHP_EOL;

print "is_nan(\$not_a_number): " . is_nan($not_a_number) . "\n";

print PHP_EOL;

```

**View**:
[Example](../../../example/code/floating_point/not_a_number.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
$not_a_number = acos(2); // NAN (double)

is_nan($not_a_number): 1

```

*Example: Floating point exponential notation*

```php
<?php

print "5e3 / 5E3: " . 5e3 . " / " . 5E3 . "\n";
print "5e+3 / 5E+3: " . 5e+3 . " / " . 5E+3 . "\n";
print "5e-3 / 5E-3: " . 5e-3 . " / " . 5E-3 . "\n\n";

print "type of 5e3: " . gettype(5e3) . "\n\n";

print "1.5e3 / 1.5E3: " . 1.5e3 . " / " . 1.5E3 . "\n";
print "1.5e+3 / 1.5E+3: " . 1.5e+3 . " / " . 1.5E+3 . "\n";
print "1.5e-3 / 1.5E-3: " . 1.5e-3 . " / " . 1.5E-3 . "\n\n";

print "type of 1.5e-3: " . gettype(1.5e-3) . "\n\n";

```

**View**:
[Example](../../../example/code/floating_point/floating_point_exponential_notation.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
5e3 / 5E3: 5000 / 5000
5e+3 / 5E+3: 5000 / 5000
5e-3 / 5E-3: 0.005 / 0.005

type of 5e3: double

1.5e3 / 1.5E3: 1500 / 1500
1.5e+3 / 1.5E+3: 1500 / 1500
1.5e-3 / 1.5E-3: 0.0015 / 0.0015

type of 1.5e-3: double

```

[▵ Up](#floating-point)
[⌂ Home](../../../README.md)
[▲ Previous: Integers](../integers/integers.md)
[▼ Next: Strings](../strings/strings.md)
