[⌂ Home](../../../README.md)
[▲ Previous: Control flow](../control_flow/control_flow.md)

# `if` conditional statement

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

The **`if` construct** is one of the most important features of many languages, PHP included. It allows for conditional execution of code fragments. PHP features an *`if` structure* that is similar to that of C:

```
if (expr)
  statement
```

As described in the section about *expressions*, *expression* is evaluated to its *boolean* value. If *expression* evaluates to `true`, PHP will execute *statement*, and if it evaluates to `false` - it'll ignore it.

The following example would display `a is bigger than b` if `$a` is bigger than `$b`:

```php
<?php
if ($a > $b)
  echo "a is bigger than b";
?>
```

Often you'd want to have more than one *statement* to be executed conditionally. Of course, there's no need to wrap each statement with an *`if` clause*. Instead, you can group several statements into a *statement group*. For example, this code would display `a is bigger than b` if `$a` is bigger than `$b`, and would then assign the value of `$a` into `$b`:

```php
<?php
if ($a > $b) {
  echo "a is bigger than b";
  $b = $a;
}
?>
```

If statements can be nested infinitely within other *`if` statements*, which provides you with complete flexibility for conditional execution of the various parts of your program.

-- [PHP Reference](https://www.php.net/manual/en/control-structures.if.php)

## Example

```php
<?php

if (1 > 2)
  print("1 > 2\n");

if (2 > 1)
  print("2 > 1\n");

```

**View**:
[Example](../../../example/code/control_flow/if/if.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
2 > 1
```

## Formatting

The following example shows the all possible formating of the statement (but not all are compliant with the official PHP formatting standards).

```php
<?php

$condition = (1 > 2);

if ($condition)
  print("1 > 2\n");

$condition = (2 > 1);

if ($condition)
  print("2 > 1\n");

print("\n");

if (1 > 2)
  print("1 > 2\n");

if (2 > 1)
  print("2 > 1\n");

print("\n");

if (1 > 2) print("1 > 2\n");

if (2 > 1) print("2 > 1\n");

print("\n");

if (1 > 2) {
  print("1 > 2\n");
}

if (2 > 1) {
  print("2 > 1\n");
}

print("\n");

// Shortened form for HTML templates:

if (1 > 2):
  print("1 > 2\n");
endif;

if (2 > 1):
  print("2 > 1\n");
endif;

print("\n");

if (1 > 2): print("1 > 2\n"); endif;

if (2 > 1): print("2 > 1\n"); endif;

print("\n");

```

**View**:
[Example](../../../example/code/control_flow/if/if_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
2 > 1

2 > 1

2 > 1

2 > 1

2 > 1

2 > 1

```

## Alternative syntax

The following example shows the shortened form for HTML templates.

```php
<?php

if (1 > 2):
  print("1 > 2\n");
endif;

if (2 > 1):
  print("2 > 1\n");
endif;

```

**View**:
[Example](../../../example/code/control_flow/if/if_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
2 > 1
```

[▵ Up](#if-conditional-statement)
[⌂ Home](../../../README.md)
[▲ Previous: Control flow](../control_flow/control_flow.md)
