[⌂ Home](../../../README.md)
[▲ Previous: Execution operators](./execution_operators.md)

# Logical operators

**Logical Operators**

| Example | Name | Result |
|---------|------|--------|
| `$a and $b` | And | true if both `$a` and `$b` are true. |
| `$a or $b` | Or | true if either `$a` or `$b` is true. |
| `$a xor $b` | Xor | true if either `$a` or `$b` is true, but not both. |
| `! $a` | Not | true if `$a` is not true. |
| `$a && $b` | And | true if both `$a` and `$b` are true. |
| `$a \|\| $b` | Or | true if either `$a` or `$b` is true. |

The reason for the two different variations of "and" and "or" operators is that they operate at different precedences. (See Operator Precedence.)

-- [PHP Reference](https://www.php.net/manual/en/language.operators.logical.php)

*Example: Logical operators*

```php
<?php

$a = true; $b = false;

// Logical conjunction (with high precedence)
$c = $a && $b;
print("{$a} && {$b} = {$c}\n");
$c = $a && $a;
print("{$a} && {$a} = {$c}\n");
$c = $b && $b;
print("{$b} && {$b} = {$c}\n\n");
// Logical disjunction (alternation) (with high precedence)
$c = $a || $b;
print("{$a} || {$b} = {$c}\n");
$c = $a || $a;
print("{$a} || {$a} = {$c}\n");
$c = $b || $b;
print("{$b} || {$b} = {$c}\n\n");
// Logical negation (with high precedence)
$c = !$a;
print("!{$a} = {$c}\n");
$c = !$b;
print("!{$b} = {$c}\n\n");

// Logical conjunction (with low precedence)
$c = ($a and $b);
print("({$a} and {$b}) = {$c}\n");
$c = ($a and $a);
print("({$a} and {$a}) = {$c}\n");
$c = ($b and $b);
print("({$b} and {$b}) = {$c}\n\n");
// Logical disjunction (alternation) (with low precedence)
$c = ($a or $b);
print("({$a} or {$b}) = {$c}\n");
$c = ($a or $a);
print("({$a} or {$a}) = {$c}\n");
$c = ($b or $b);
print("({$b} or {$b}) = {$c}\n\n");
// Exclusive disjunction (alternation) (with low precedence)
$c = ($a xor $b);
print("({$a} xor {$b}) = {$c}\n");
$c = ($a xor $a);
print("({$a} xor {$a}) = {$c}\n");
$c = ($b xor $b);
print("({$b} xor {$b}) = {$c}\n\n");

```

**View**:
[Example](../../../example/code/operators/logical_operators.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
1 &&  =
1 && 1 = 1
 &&  =

1 ||  = 1
1 || 1 = 1
 ||  =

!1 =
! = 1

(1 and ) =
(1 and 1) = 1
( and ) =

(1 or ) = 1
(1 or 1) = 1
( or ) =

(1 xor ) = 1
(1 xor 1) =
( xor ) =

```

*Example: Logical operators illustrated*

```php
<?php

// --------------------
// foo() will never get called as those operators are short-circuit

$a = (false && foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" has a greater precedence than "or"

// The result of the expression (false || true) is assigned to $e
// Acts like: ($e = (false || true))
$e = false || true;

// The constant false is assigned to $f before the "or" operation occurs
// Acts like: (($f = false) or true)
$f = false or true;

var_dump($e, $f);

// --------------------
// "&&" has a greater precedence than "and"

// The result of the expression (true && false) is assigned to $g
// Acts like: ($g = (true && false))
$g = true && false;

// The constant true is assigned to $h before the "and" operation occurs
// Acts like: (($h = true) and false)
$h = true and false;

var_dump($g, $h);
?>
```

The above example will output something similar to:

```
bool(true)
bool(false)
bool(false)
bool(true)
```

-- [PHP Reference](https://www.php.net/manual/en/language.operators.logical.php)

[▵ Up](#logical-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Execution operators](./execution_operators.md)
