[⌂ Home](../../../README.md)
[▲ Previous: Operators](./operators.md)

# Arithmetic operators

Remember basic arithmetic from school? These work just like those.

**Arithmetic Operators**

| Example | Name | Result |
|---------|------|--------|
| +$a | Identity | Conversion of $a to int or float as appropriate. |
| -$a | Negation | Opposite of $a. |
| $a + $b | Addition | Sum of $a and $b. |
| $a - $b | Subtraction | Difference of $a and $b. |
| $a * $b | Multiplication | Product of $a and $b. |
| $a / $b | Division | Quotient of $a and $b. |
| $a % $b | Modulo | Remainder of $a divided by $b. |
| $a ** $b | Exponentiation | Result of raising $a to the $b'th power. |

-- [PHP Reference](https://www.php.net/manual/en/language.operators.arithmetic.php)

*Example: Basic usage*

```php
<?php

$a = 6; $b = 2;

// Identity
print("+{$b} = " . +$b . "\n");
// Negation
print("-{$a} = " . -$a . "\n");
// Addition
$c = $a + $b;
print("{$a} + {$b} = {$c}\n");
// Subtraction
$c = $a - $b;
print("{$a} - {$b} = {$c}\n");
// Multiplication
$c = $a * $b;
print("{$a} * {$b} = {$c}\n");
// Division
$c = $a / $b;
print("{$a} / {$b} = {$c}\n");
// Modulo
$c = $a % $b;
print("{$a} % {$b} = {$c}\n");
// Exponentiation
$c = $a ** $b;
print("{$a} ** {$b} = {$c}\n");

```

**View**:
[Example](../../../example/code/operators/arithmetic_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
+2 = 2
-6 = -6
6 + 2 = 8
6 - 2 = 4
6 * 2 = 12
6 / 2 = 3
6 % 2 = 0
6 ** 2 = 36

```

The *division operator* `/` returns a `float` value unless the two operands are `int` (or numeric `strings` which are *type juggled* to `int`) and the numerator is a multiple of the divisor, in which case an integer value will be returned. For integer division, see `intdiv()`.

Operands of *modulo* are converted to `int` before processing. For *floating-point* *modulo*, see `fmod()`.

The result of the *modulo operator* `%` has the same sign as the dividend — that is, the result of `$a % $b` will have the same sign as `$a`. For example:

*Example: The Modulo Operator*

```php
<?php
var_dump(5 % 3);
var_dump(5 % -3);
var_dump(-5 % 3);
var_dump(-5 % -3);
?>
```

The above example will output:

```
int(2)
int(2)
int(-2)
int(-2)
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.arithmetic.php)

*Example: Modulo operator cases*

```php
<?php

$i1 = 6; $i2 = 1;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");
$i1 = 6; $i2 = 2;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");
$i1 = 6; $i2 = 3;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");
$i1 = 6; $i2 = 4;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");
$i1 = 6; $i2 = 5;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");
$i1 = 6; $i2 = 6;
print("{$i1} % {$i2} = " . ($i1 % $i2) . "\n");

$f1 = 6.4; $f2 = 3.2;
print("{$f1} % {$f2} = " . ($f1 % $f2) . "\n");

```

**View**:
[Example](../../../example/code/operators/modulo_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
6 % 1 = 0
6 % 2 = 0
6 % 3 = 0
6 % 4 = 2
6 % 5 = 1
6 % 6 = 0
6.4 % 3.2 = 0
```

[▵ Up](#arithmetic-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Operators](./operators.md)
