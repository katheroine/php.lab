[⌂ Home](../../../README.md)
[▲ Previous: `if` conditional statement](./if.md)

# `if`-`else` conditional statement

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

Often you'd want to execute a statement if a certain condition is met, and a different statement if the condition is not met. This is what `else` is for. `else` extends an if statement to execute a statement in case the expression in the *`if` statement* evaluates to `false`. For example, the following code would display `a is greater than b` if `$a` is greater than `$b`, and `a is NOT greater than b` otherwise:

```php
<?php
if ($a > $b) {
  echo "a is greater than b";
} else {
  echo "a is NOT greater than b";
}
?>
```

The *`else` statement* is only executed if the *`if` expression* evaluated to `false`, and if there were any `elseif` expressions - only if they evaluated to `false` as well.

Note: Dangling else

In case of nested *`if` - `else` statements*, an `else` is always associated with the nearest `if`.

```php
<?php
$a = false;
$b = true;
if ($a)
    if ($b)
        echo "b";
else
    echo "c";
?>
```

Despite the indentation (which does not matter for PHP), the `else` is associated with the `if` (`$b`), so the example does not produce any output. While relying on this behavior is valid, it is recommended to avoid it by using curly braces to resolve potential ambiguities.

-- [PHP Reference](https://www.php.net/manual/en/control-structures.else.php)

## Example

```php
<?php

if (1 > 2)
  print("1 > 2\n");
else
  print("!(1 > 2)\n");

if (2 > 1)
  print("2 > 1\n");
else
  print("!(2 > 1)\n");

```

**View**:
[Example](../../../example/code/control_flow/if/if_else.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
!(1 > 2)
2 > 1
```

## Formatting

The following example shows the all possible formating of the statement (but not all are compliant with the official PHP formatting standards).

```php
<?php

$condition = (1 > 2);

if ($condition)
  print("1 > 2\n");
else
  print("!(1 > 2)\n");

$condition = (2 > 1);

if ($condition)
  print("2 > 1\n");
else
  print("!(2 > 1)\n");

print("\n");

if (1 > 2)
  print("1 > 2\n");
else
  print("!(1 > 2)\n");

if (2 > 1)
  print("2 > 1\n");
else
  print("!(2 > 1)\n");

print("\n");

if (1 > 2) print("1 > 2\n");
else print("!(1 > 2)\n");

if (2 > 1) print("2 > 1\n");
else print("!(2 > 1)\n");

print("\n");

if (1 > 2) {
  print("1 > 2\n");
} else {
  print("!(1 > 2)\n");
}

if (2 > 1) {
  print("2 > 1\n");
} else {
  print("!(2 > 1)\n");
}

print("\n");

// Shortened form for HTML templates:

if (1 > 2):
  print("1 > 2\n");
else:
  print("!(1 > 2)\n");
endif;

if (2 > 1):
  print("2 > 1\n");
else:
  print("!(2 > 1)\n");
endif;

print("\n");

if (1 > 2):  print("1 > 2\n");
else: print("!(1 > 2)\n"); endif;

if (2 > 1):  print("2 > 1\n");
else: print("!(2 > 1)\n"); endif;

print("\n");

```

**View**:
[Example](../../../example/code/control_flow/if/if_else_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
!(1 > 2)
2 > 1

!(1 > 2)
2 > 1

!(1 > 2)
2 > 1

!(1 > 2)
2 > 1

!(1 > 2)
2 > 1

!(1 > 2)
2 > 1

```

## Alternative syntax

The following example shows the shortened form for HTML templates.

```php
<?php

if (1 > 2):
  print("1 > 2\n");
else:
  print("!(1 > 2)\n");
endif;

if (2 > 1):
  print("2 > 1\n");
else:
  print("!(2 > 1)\n");
endif;

```

**View**:
[Example](../../../example/code/control_flow/if/if_else_alternative_syntax.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
!(1 > 2)
2 > 1
```

[▵ Up](#if---else-conditional-statement)
[⌂ Home](../../../README.md)
[▲ Previous: `if` conditional statement](./if.md)
