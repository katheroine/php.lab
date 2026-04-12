[⌂ Home](../../../README.md)
[▲ Previous: Increment & decrement operators](./increment_decrement_operators.md)
[▼ Next: String operators](./string_operators.md)

# Assignment operators

The basic **assignment operator** is `=`. Your first inclination might be to think of this as "equal to". Don't. It really means that the left operand gets set to the value of the expression on the right (that is, "gets set to").

-- [PHP Reference](https://www.php.net/manual/en/language.operators.assignment.php)

*Example: Basic usage of basic assignment operator*

```php
<?php

$someValue = 5;
$otherValue = "pumpkin";

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);

$otherValue = $someValue;
$someValue = $someValue + 3;

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/operators/basic_assignment_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$someValue: 5
$otherValue: pumpkin

$someValue: 8
$otherValue: 5

```

### Other assignment operators

#### Arithmetic Assignment Operators

| Example | Equivalent | Operation |
|---------|-----------|-----------|
| `$a += $b` | `$a = $a + $b` | Addition |
| `$a -= $b` | `$a = $a - $b` | Subtraction |
| `$a *= $b` | `$a = $a * $b` | Multiplication |
| `$a /= $b` | `$a = $a / $b` | Division |
| `$a %= $b` | `$a = $a % $b` | Modulus |
| `$a **= $b` | `$a = $a ** $b` | Exponentiation |

#### Bitwise Assignment Operators

| Example | Equivalent | Operation |
|---------|-----------|-----------|
| `$a &= $b` | `$a = $a & $b` | Bitwise And |
| `$a \|= $b` | `$a = $a \| $b` | Bitwise Or |
| `$a ^= $b` | `$a = $a ^ $b` | Bitwise Xor |
| `$a <<= $b` | `$a = $a << $b` | Left Shift |
| `$a >>= $b` | `$a = $a >> $b` | Right Shift |

#### Other assignment operators

| Example | Equivalent | Operation |
|---------|-----------|-----------|
| `$a .= $b` | `$a = $a . $b` | String Concatenation |
| `$a ??= $b` | `$a = $a ?? $b` | Null Coalesce |

-- [PHP Reference](https://www.php.net/manual/en/language.operators.assignment.php)

*Example: All the assignment operators*

```php
<?php

$a = 0; $b = 0;

print("\$a: {$a}\n");
print("\$b: {$b}\n");

print("\n");

$a = 0;
$b = 3;

print("\$a = 0; \$a: {$a}\n");
print("\$b = 3; \$b: {$b}\n");

print("\n");

$a = $b; // 3
$b = 5; // 5

print("\$a = {$b}; \$a: {$a}\n");
print("\$b = 5; \$b: {$b}\n");

print("\n");

$a += 3; // 6
print("\$a += 3; \$a: {$a}\n");

$a -= 2; // 4
print("\$a -= 2; \$a: {$a}\n");

$a *= 2; // 8
print("\$a *= 2; \$a: {$a}\n");

$a /= 4; // 2
print("\$a /= 4; \$a: {$a}\n");

$a %= 3; // 2
print("\$a %= 3; \$a: {$a}\n");

$a <<= 2; // 8
print("\$a <<= 2; \$a: {$a}\n");

$a >>= 1; // 4
print("\$a >>= 1; \$a: {$a}\n");

$a &= 6; // 4
print("\$a &= 6; \$a: {$a}\n");

$a |= 2; // 6
print("\$a |= 2; \$a: {$a}\n");

$a ^= 3; // 5
print("\$a ^= 3; \$a: {$a}\n");

```

**View**:
[Example](../../../example/code/operators/assignment_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$a: 0
$b: 0

$a = 0; $a: 0
$b = 3; $b: 3

$a = 5; $a: 3
$b = 5; $b: 5

$a += 3; $a: 6
$a -= 2; $a: 4
$a *= 2; $a: 8
$a /= 4; $a: 2
$a %= 3; $a: 2
$a <<= 2; $a: 8
$a >>= 1; $a: 4
$a &= 6; $a: 4
$a |= 2; $a: 6
$a ^= 3; $a: 5

```

*Example: Null coalescing assignment operator*

```php
<?php

$value = null;
$value ??= 'hello';
print("Value: {$value}\n");

$value = true;
$value ??= 'hello';
print("Value: {$value}\n");

$value = false;
$value ??= 'hello';
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

$items[2] ??= '-';
print("Value: {$items[2]}\n");

$items[3] ??= '-';
print("Value: {$items[3]}\n");

$items['details']['color'] ??= '-';
print("Value: {$items['details']['color']}\n");

$items['details']['weather'] ??= '-';
print("Value: {$items['details']['weather']}\n");

print(PHP_EOL);

$object = (object) [
    'text' => "Hello, there!",
    'details' => (object)
    [
        'color' => 'orange',
        'value' => 'PI',
    ]
];

$object->text ??= '-';
print("Value: {$object->text}\n");

$object->content ??= '-';
print("Value: {$object->content}\n");

$object->details->color ??= '-';
print("Value: {$object->details->color}\n");

$object->details->weather ??= '-';
print("Value: {$object->details->weather}\n");

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/operators/assignment_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Value: hello
Value: 1
Value:

Value: Hello, there!
Value: -
Value: orange
Value: -

Value: Hello, there!
Value: -
Value: orange
Value: -

```

### The value of the assignment expression

*The value of an assignment expression is the value assigned.* That is, the value of `$a = 3` is `3`. This allows you to do some tricky things:

*Example: Nested Assignments*

```php
<?php
$a = ($b = 4) + 5; // $a is equal to 9 now, and $b has been set to 4.
var_dump($a);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.assignment.php)

*Example: Assignment expression value*

```php
<?php

$iv = ($i = 3);
print("(\$i = 3) = {$iv}\n");

$fv = ($f = 2.5);
print("(\$f = 2.5) = {$fv}\n");

```

**View**:
[Example](../../../example/code/operators/assignment_operator_expression_value.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
($i = 3) = 3
($f = 2.5) = 2.5
```

In addition to the basic assignment operator, there are "combined operators" for all of the binary arithmetic, array union and string operators that allow you to use a value in an expression and then set its value to the result of that expression. For example:

*Example: Combined Assignments*

```php
<?php
$a = 3;
$a += 5; // sets $a to 8, as if we had said: $a = $a + 5;
$b = "Hello ";
$b .= "There!"; // sets $b to "Hello There!", just like $b = $b . "There!";

var_dump($a, $b);
?>
```

Note that the assignment copies the original variable to the new one (assignment by value), so changes to one will not affect the other. This may also have relevance if you need to copy something like a large array inside a tight loop.

An exception to the usual assignment by value behaviour within PHP occurs with objects, which are assigned by reference. Objects may be explicitly copied via the clone keyword.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.assignment.php)

### Assignment by reference

*Assignment by reference* is also supported, using the `$var = &$othervar;` syntax. Assignment by reference means that both variables end up pointing at the same data, and nothing is copied anywhere.

*Example: Assigning by reference*

```php
<?php
$a = 3;
$b = &$a; // $b is a reference to $a

print "$a\n"; // prints 3
print "$b\n"; // prints 3

$a = 4; // change $a

print "$a\n"; // prints 4
print "$b\n"; // prints 4 as well, since $b is a reference to $a, which has
              // been changed
?>
```

The new operator returns a reference automatically, as such assigning the result of new by reference is an error.

*Example: new Operator By-Reference*

```php
<?php
class C {}

$o = &new C;
?>
```

The above example will output:

```
Parse error: syntax error, unexpected token ";", expecting "("
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.assignment.php)

[▵ Up](#assignment-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Increment & decrement operators](./increment_decrement_operators.md)
[▼ Next: String operators](./string_operators.md)
