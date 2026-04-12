[⌂ Home](../../../README.md)
[▲ Previous: Bitwise operators](./bitwise_operators.md)
[▼ Next: Increment & decrement operators](./increment_decrement_operators.md)

# Comparison operators

**Comparison operators**, as their name implies, allow you to compare two values. You may also be interested in viewing the type comparison tables, as they show examples of various type related comparisons.

**Comparison operators**

| Example | Name | Result |
|---------|------|--------|
| `$a == $b` | Equal | true if `$a` is equal to `$b` after type juggling. |
| `$a === $b` | Identical | true if `$a` is equal to `$b`, and they are of the same type. |
| `$a != $b` | Not equal | true if `$a` is not equal to `$b` after type juggling. |
| `$a <> $b` | Not equal | true if `$a` is not equal to `$b` after type juggling. |
| `$a !== $b` | Not identical | true if `$a` is not equal to `$b`, or they are not of the same type. |
| `$a < $b` | Less than | true if `$a` is strictly less than `$b`. |
| `$a > $b` | Greater than | true if `$a` is strictly greater than `$b`. |
| `$a <= $b` | Less than or equal to | true if `$a` is less than or equal to `$b`. |
| `$a >= $b` | Greater than or equal to | true if `$a` is greater than or equal to `$b`. |
| `$a <=> $b` | Spaceship | An int less than, equal to, or greater than zero when `$a` is less than, equal to, or greater than `$b`, respectively. |

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php)

*Example: Basic usage*

```php
<?php

$a = 1; $b = 2; $c = false;

// Less than
$c = $a < $b;
print("{$a} < {$b} = {$c}\n");
// Greater than
$c = $a > $b;
print("{$a} > {$b} = {$c}\n");
// Less than or equal to
$c = $a <= $b;
print("{$a} <= {$b} = {$c}\n");
// Greater than or equal to
$c = $a >= $b;
print("{$a} >= {$b} = {$c}\n");
// Equal
$c = $a == $b;
print("{$a} == {$b} = {$c}\n");
// Not equal
$c = $a != $b;
print("{$a} != {$b} = {$c}\n");
$c = $a <> $b;
print("{$a} != {$b} = {$c}\n");

// Identical
$c = $a === $b;
print("{$a} === {$b} = {$c}\n");
// Not identical
$c = $a !== $b;
print("{$a} !== {$b} = {$c}\n");

// Three-way comparison
$c = $a <=> $b; // "Spaceship operator"
print("{$a} <=> {$b} = {$c}\n");

```

**View**:
[Example](../../../example/code/operators/comparison_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
1 < 2 = 1
1 > 2 =
1 <= 2 = 1
1 >= 2 =
1 == 2 =
1 != 2 = 1
1 != 2 = 1
1 === 2 =
1 !== 2 = 1
1 <=> 2 = -1
```

*Example: Strict exquality and inequality operators*

```php
<?php

$i1 = 1; $i2 = 2;
print("(integer) {$i1} == (integer) {$i2} = " . ($i1 == $i2) . "\n");
print("(integer) {$i1} === (integer) {$i2} = " . ($i1 === $i2) . "\n");
print("(integer) {$i1} != (integer) {$i2} = " . ($i1 != $i2) . "\n");
print("(integer) {$i1} !== (integer) {$i2} = " . ($i1 !== $i2) . "\n\n");

$i1 = 2; $i2 = 2;
print("(integer) {$i1} == (integer) {$i2} = " . ($i1 == $i2) . "\n");
print("(integer) {$i1} === (integer) {$i2} = " . ($i1 === $i2) . "\n");
print("(integer) {$i1} != (integer) {$i2} = " . ($i1 != $i2) . "\n");
print("(integer) {$i1} !== (integer) {$i2} = " . ($i1 !== $i2) . "\n\n");

$i1 = 2; $s1 = "2";
print("(integer) {$i1} == (string) {$s1} = " . ($i1 == $s1) . "\n");
print("(integer) {$i1} === (string) {$s1} = " . ($i1 === $s1) . "\n");
print("(integer) {$i1} != (string) {$s1} = " . ($i1 != $s1) . "\n");
print("(integer) {$i1} !== (string) {$s1} = " . ($i1 !== $s1) . "\n\n");

$s1 = "2"; $s2 = "2";
print("(string) {$s1} == (string) {$s2} = " . ($s1 == $s2) . "\n");
print("(string) {$s1} === (string) {$s2} = " . ($s1 === $s2) . "\n");
print("(string) {$s1} != (string) {$s2} = " . ($s1 != $s2) . "\n");
print("(string) {$s1} !== (string) {$s2} = " . ($s1 !== $s2) . "\n\n");

$s1 = "1"; $s2 = "2";
print("(string) {$s1} == (string) {$s2} = " . ($s1 == $s2) . "\n");
print("(string) {$s1} === (string) {$s2} = " . ($s1 === $s2) . "\n");
print("(string) {$s1} != (string) {$s2} = " . ($s1 != $s2) . "\n");
print("(string) {$s1} !== (string) {$s2} = " . ($s1 !== $s2) . "\n\n");

```

**View**:
[Example](../../../example/code/operators/strict_equality_inequality_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
(integer) 1 == (integer) 2 =
(integer) 1 === (integer) 2 =
(integer) 1 != (integer) 2 = 1
(integer) 1 !== (integer) 2 = 1

(integer) 2 == (integer) 2 = 1
(integer) 2 === (integer) 2 = 1
(integer) 2 != (integer) 2 =
(integer) 2 !== (integer) 2 =

(integer) 2 == (string) 2 = 1
(integer) 2 === (string) 2 =
(integer) 2 != (string) 2 =
(integer) 2 !== (string) 2 = 1

(string) 2 == (string) 2 = 1
(string) 2 === (string) 2 = 1
(string) 2 != (string) 2 =
(string) 2 !== (string) 2 =

(string) 1 == (string) 2 =
(string) 1 === (string) 2 =
(string) 1 != (string) 2 = 1
(string) 1 !== (string) 2 = 1

```

*Example: Three-way comparison (spaceship) operator*

```php
<?php

$a = 1; $b = 2;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");
$a = 2; $b = 1;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");
$a = 2; $b = 2;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");

```

**View**:
[Example](../../../example/code/operators/three_way_comparison_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
1 <=> 2 = -1
2 <=> 1 = 1
2 <=> 2 = 0
```

If both operands are *numeric strings*, or one operand is a *number* and the other one is a *numeric string*, then the comparison is done numerically. These rules also apply to the `switch` statement. The *type conversion* does not take place when the comparison is `===` or `!==` as this involves comparing the type as well as the value.

Warning

Prior to PHP 8.0.0, if a *string* is compared to a *number* or a *numeric string* then the *string* was converted to a *number* before performing the comparison. This can lead to surprising results as can be seen with the following example:

```php
<?php
var_dump(0 == "a");
var_dump("1" == "01");
var_dump("10" == "1e1");
var_dump(100 == "1e2");

switch ("a") {
case 0:
    echo "0";
    break;
case "a":
    echo "a";
    break;
}
?>
```

Output of the above example in PHP 7:

```
bool(true)
bool(true)
bool(true)
bool(true)
0
```

Output of the above example in PHP 8:

```
bool(false)
bool(true)
bool(true)
bool(true)
a
```

*Example: Comparison operators*

```php
<?php
// Integers
echo 1 <=> 1, ' '; // 0
echo 1 <=> 2, ' '; // -1
echo 2 <=> 1, ' '; // 1

// Floats
echo 1.5 <=> 1.5, ' '; // 0
echo 1.5 <=> 2.5, ' '; // -1
echo 2.5 <=> 1.5, ' '; // 1

// Strings
echo "a" <=> "a", ' '; // 0
echo "a" <=> "b", ' '; // -1
echo "b" <=> "a", ' '; // 1

echo "a" <=> "aa", ' ';  // -1
echo "zz" <=> "aa", ' '; // 1

// Arrays
echo [] <=> [], ' ';               // 0
echo [1, 2, 3] <=> [1, 2, 3], ' '; // 0
echo [1, 2, 3] <=> [], ' ';        // 1
echo [1, 2, 3] <=> [1, 2, 1], ' '; // 1
echo [1, 2, 3] <=> [1, 2, 4], ' '; // -1

// Objects
$a = (object) ["a" => "b"];
$b = (object) ["a" => "b"];
echo $a <=> $b, ' '; // 0

$a = (object) ["a" => "b"];
$b = (object) ["a" => "c"];
echo $a <=> $b, ' '; // -1

$a = (object) ["a" => "c"];
$b = (object) ["a" => "b"];
echo $a <=> $b, ' '; // 1

// not only values are compared; keys must match
$a = (object) ["a" => "b"];
$b = (object) ["b" => "b"];
echo $a <=> $b, ' '; // 1

?>
```

For various types, comparison is done according to the following table (in order).

*Comparison with various types*

| Type of Operand 1 | Type of Operand 2 | Result |
|---|---|---|
| `null` or `string` | `string` | Convert `null` to `""`, numerical or lexical comparison |
| `bool` or `null` | anything | Convert both sides to `bool`, `false` < `true` |
| `object` | `object` | Built-in classes can define its own comparison, different classes are incomparable, same class see Object Comparison |
| `string`, `resource`, `int` or `float` | `string`, `resource`, `int` or `float` | Translate strings and resources to numbers, usual math |
| `array` | `array` | Array with fewer members is smaller, if key from operand 1 is not found in operand 2 then arrays are incomparable, otherwise - compare value by value (see following example) |
| `object` | anything | `object` is always greater |
| `array` | anything | `array` is always greater |

*Example: Boolean/null comparison*

```php
<?php
// Bool and null are compared as bool always
var_dump(1 == TRUE);  // TRUE - same as (bool) 1 == TRUE
var_dump(0 == FALSE); // TRUE - same as (bool) 0 == FALSE
var_dump(100 < TRUE); // FALSE - same as (bool) 100 < TRUE
var_dump(-10 < FALSE);// FALSE - same as (bool) -10 < FALSE
var_dump(min(-100, -10, NULL, 10, 100)); // NULL - (bool) NULL < (bool) -100 is FALSE < TRUE
?>
```

*Example: Transcription of standard array comparison*

```php
<?php
// Arrays are compared like this with standard comparison operators as well as the spaceship operator.
function standard_array_compare($op1, $op2)
{
    if (count($op1) < count($op2)) {
        return -1; // $op1 < $op2
    } elseif (count($op1) > count($op2)) {
        return 1; // $op1 > $op2
    }
    foreach ($op1 as $key => $val) {
        if (!array_key_exists($key, $op2)) {
            return 1;
        } elseif ($val < $op2[$key]) {
            return -1;
        } elseif ($val > $op2[$key]) {
            return 1;
        }
    }
    return 0; // $op1 == $op2
}
?>
```

## Comparison of floating point numbers

Because of the way *floats* are represented internally, you *should not test two floats for equality*.

Note: Be aware that PHP's *type juggling* is not always obvious when comparing values of different types, particularly comparing *ints* to *bools* or *ints* to *strings*. It is therefore generally advisable to use `===` and `!==` comparisons rather than `==` and `!=` in most cases.

## Incomparable values

While *identity comparison* (`===` and `!==`) can be applied to arbitrary values, the other *comparison operators* should only be applied to *comparable values*. The result of comparing *incomparable values* is undefined, and should not be relied upon.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.incomparable)

## Ternary operator

Another conditional operator is the *`?:` (or ternary) operator*.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)

*Example: Ternary operator*

```php
<?php

$value = readline("Give some value: ");

$state = ($value < 10) ? "low" : "high";

print("Value is {$state}. ");

($value < 10) ? print("Cool!\n") : print("Woah!\n");

```

**View**:
[Example](../../../example/code/operators/ternary_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Give some value: 1
Value is low. Cool!
```

```
Give some value: 100
Value is high. Woah!
```

*Example: Assigning a default value*

```php
<?php
// Example usage for: Ternary Operator
$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];

// The above is identical to this if/else statement
if (empty($_POST['action'])) {
    $action = 'default';
} else {
    $action = $_POST['action'];
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)

The expression `(expr1) ? (expr2) : (expr3)` evaluates to `expr2` if `expr1` evaluates to `true`, and `expr3` if `expr1` evaluates to `false`.
It is possible to leave out the middle part of the ternary operator. Expression `expr1 ?: expr3` evaluates to the result of `expr1` if `expr1` evaluates to `true`, and `expr3` otherwise. `expr1` is only evaluated once in this case.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)

*Example: Ternary operator shorthand (short-ternary operator)*

```php
<?php

$value = readline("Give your nickname: ");

$nickname = $value ?: "unknown";

print("Your nickname is: {$nickname}\n");

```

**View**:
[Example](../../../example/code/operators/ternary_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Give your nickname: katheroine
Your nickname is: katheroine
```

```
Give your nickname:
Your nickname is: unknown
```

*Example: Ternary operator and conversions*

```php
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

```

**View**:
[Example](../../../example/code/operators/ternary_operator_conversions.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
false: no
true: yes
0: no
2: yes
"0": no
"2": yes
"a": yes
null: no
```

Note: Please note that the *ternary operator* is an *expression*, and that it doesn't evaluate to a variable, but to the result of an expression. This is important to know if you want to return a variable by reference. The statement `return $var == 42 ? $a : $b;` in a return-by-reference function will therefore not work and a warning is issued.

Note:

It is recommended to avoid "stacking" *ternary expressions*. PHP's behaviour when using more than one unparenthesized ternary operator within a single expression is non-obvious compared to other languages. Indeed prior to PHP 8.0.0, ternary expressions were evaluated *left-associative*, instead of *right-associative* like most other programming languages. Relying on left-associativity is deprecated as of PHP 7.4.0. As of PHP 8.0.0, the ternary operator is *non-associative*.

*Example: Non-obvious ternary behaviour*

```php
<?php
// on first glance, the following appears to output 'true'
echo (true ? 'true' : false ? 't' : 'f');

// however, the actual output of the above is 't' prior to PHP 8.0.0
// this is because ternary expressions are left-associative

// the following is a more obvious version of the same code as above
echo ((true ? 'true' : false) ? 't' : 'f');

// here, one can see that the first expression is evaluated to 'true', which
// in turn evaluates to (bool) true, thus returning the true branch of the
// second ternary expression.
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)

*Example: Nested (stacked) ternary operators*

```php
<?php

$number = 3;
// $vaule = ($number < 2) ? "Number is less than 2." : ($number > 2) ? "Number is more than 2." : "Number is 2.";
$result = ($number < 2) ? "Number is less than 2." : (($number > 2) ? "Number is more than 2." : "Number is 2.");
print($result . PHP_EOL);

```

**View**:
[Example](../../../example/code/operators/nested_ternary_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Number is more than 2.
```

Note:

Chaining of short-ternaries (`?:`), however, is stable and behaves reasonably. It will evaluate to the first argument that evaluates to a non-falsy value. Note that undefined values will still raise a warning.

*Example: Short-ternary chaining*

```php
<?php
echo 0 ?: 1 ?: 2 ?: 3, PHP_EOL; //1
echo 0 ?: 0 ?: 2 ?: 3, PHP_EOL; //2
echo 0 ?: 0 ?: 0 ?: 3, PHP_EOL; //3
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary)

## Null coalescing operator

Another useful shorthand operator is the *`??` (or null coalescing) operator*.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php)

*Example: Null coalescing operator*

```php
<?php

$value = 'hi' ?? 'hello';
print("Value: {$value}\n");

$value = null ?? 'hello';
print("Value: {$value}\n");

print(PHP_EOL);

$items = [
    2 => "Hello, there!",
    'details' =>
    [
        'color' => 'orange',
        3.14 => 'PI',
    ]
];

$value = $items[2] ?? '-';
print("Value: {$value}\n");

$value = $items[3] ?? '-';
print("Value: {$value}\n");

$value = $items['details']['color'] ?? '-';
print("Value: {$value}\n");

$value = $items['details']['weather'] ?? '-';
print("Value: {$value}\n");

print(PHP_EOL);

$object = (object) [
    'text' => "Hello, there!",
    'details' => (object)
    [
        'color' => 'orange',
        'value' => 'PI',
    ]
];

$value = $object->text ?? '-';
print("Value: {$value}\n");

$value = $object->content ?? '-';
print("Value: {$value}\n");

$value = $object->details->color ?? '-';
print("Value: {$value}\n");

$value = $object->details->weather ?? '-';
print("Value: {$value}\n");

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/operators/null_coalescing_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Value: hi
Value: hello

Value: Hello, there!
Value: -
Value: orange
Value: -

Value: Hello, there!
Value: -
Value: orange
Value: -

```

*Example: Assigning a default value*

```php
<?php
// Example usage for: Null Coalesce Operator
$action = $_POST['action'] ?? 'default';

// The above is identical to this if/else statement
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}
?>
```

The expression `(expr1) ?? (expr2)` evaluates to `expr2` if `expr1` is `null`, and `expr1` otherwise.
In particular, this operator does not emit a notice or warning if the left-hand side value does not exist, just like `isset()`. *This is especially useful on array keys.*

Note: Please note that the *null coalescing operator* is an *expression*, and that it doesn't evaluate to a variable, but to the result of an expression. This is important to know if you want to return a variable by reference. The statement `return $foo ?? $bar;` in a return-by-reference function will therefore not work and a warning is issued.

Note:

The *null coalescing operator* has low *precedence*. That means if mixing it with other operators (such as *string concatenation* or *arithmetic
operators*) parentheses will likely be required.

```php
<?php
// Raises a warning that $name is undefined.
print 'Mr. ' . $name ?? 'Anonymous';

// Prints "Mr. Anonymous"
print 'Mr. ' . ($name ?? 'Anonymous');
?>
```

Note:

Please note that the *null coalescing operator* allows for simple nesting:

*Example: Nesting null coalescing operator*

```php
<?php

$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo $foo ?? $bar ?? $baz ?? $qux; // outputs 1

?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.comparison.php)

*Example: Nested null coalescing operator*

```php
<?php

$text = "Text is set.";
$number = 3;
$result = $text ?? $number ?? "Either text and number aren't set.";
print($result . PHP_EOL);

```

**View**:
[Example](../../../example/code/operators/nested_null_coalescing_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Text is set.
```

*Example: Null coalescing operator and conversions*

```php
<?php

$value = null ?? 'hello';
print("Value: {$value}\n");

$value = true ?? 'hello';
print("Value: {$value}\n");

$value = false ?? 'hello';
print("Value: {$value}\n");

$value = 'whatever' ?? 'hello';
print("Value: {$value}\n");

```

**View**:
[Example](../../../example/code/operators/null_coalescing_operator_conversions.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Value: hello
Value: 1
Value:
Value: whatever
```

[▵ Up](#comparison-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Bitwise operators](./bitwise_operators.md)
[▼ Next: Increment & decrement operators](./increment_decrement_operators.md)
