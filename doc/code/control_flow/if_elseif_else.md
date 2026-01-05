[⌂ Home](../../../README.md)
[▲ Previous: `if`-`else` conditional statement](./if_else.md)
[▼ Next: `while` loop statement](./while.md)

# `if`-`elseif`-`else` multiple conditional statement

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

`elseif`, as its name suggests, is a combination of `if` and `else`. Like `else`, it extends an *`if` statement* to execute a different statement in case the original `*if` expression* evaluates to `false`. However, unlike `else`, it will execute that alternative expression only if the *`elseif` conditional expression* evaluates to `true`. For example, the following code would display `a is bigger than b`, `a equal to b` or `a is smaller than b`:

```php
<?php
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}
?>
```

There may be several `elseifs` within the same *`if` statement*. The first *`elseif` expression* (if any) that evaluates to `true` would be executed. In PHP, it's possible to write `else if` (in two words) and the behavior would be identical to the one of `elseif` (in a single word). The syntactic meaning is slightly different (the same behavior as C) but the bottom line is that both would result in exactly the same behavior.

The *`elseif` statement* is only executed if the preceding *`if` expression* and any preceding *`elseif` expressions* evaluated to `false`, and the current *`elseif` expression* evaluated to `true`.

Note: Note that `elseif` and `else if` will only be considered exactly the same when using curly brackets as in the above example. When using a colon to define `if`/`elseif` conditions, the use of `elseif` in a single word becomes necessary. PHP will fail with a parse error if else if is split into two words.

```php
<?php

/* Incorrect Method: */
if ($a > $b):
    echo $a." is greater than ".$b;
else if ($a == $b): // Will not compile.
    echo "The above line causes a parse error.";
endif;
<?php
/* Correct Method: */
if ($a > $b):
    echo $a." is greater than ".$b;
elseif ($a == $b): // Note the combination of the words.
    echo $a." equals ".$b;
else:
    echo $a." is neither greater than or equal to ".$b;
endif;

?>
```

-- [PHP Reference](https://www.php.net/manual/en/control-structures.elseif.php)

## Example

```php
<?php

if (1 > 2)
  print("1 > 2\n");
elseif (2 > 3)
  print("2 > 3\n");
else
  print("!(1 > 2) && !(2 > 3)\n");

if (1 > 2)
  print("1 > 2\n");
elseif (1 > 0)
  print("1 > 0\n");
else
  print("!(1 > 2) && !(1 > 0)\n");

if (2 > 1)
  print("2 > 1\n");
elseif (1 > 0)
  print("1 > 0\n");
else
  print("!(2 > 1) && !(1 > 0)\n");

```

**View**:
[Example](../../../example/code/control_flow/if/if_elseif_else.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
!(1 > 2) && !(2 > 3)
1 > 0
2 > 1
```

## Alternative syntax

The following example shows the shortened form for HTML templates.

```php
<?php

if (1 > 2):
  print("1 > 2\n");
elseif (2 > 3):
  print("2 > 3\n");
else:
  print("!(1 > 2) && !(2 > 3)\n");
endif;

if (1 > 2):
  print("1 > 2\n");
elseif (1 > 0):
  print("1 > 0\n");
else:
  print("!(1 > 2) && !(1 > 0)\n");
endif;

if (2 > 1):
  print("2 > 1\n");
elseif (1 > 0):
  print("1 > 0\n");
else:
  print("!(2 > 1) && !(1 > 0)\n");
endif;

```

**View**:
[Example](../../../example/code/control_flow/if/if_elseif_else_alternative_syntax.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
!(1 > 2) && !(2 > 3)
1 > 0
2 > 1
```

[▵ Up](#if---elseif---else-conditional-statement)
[⌂ Home](../../../README.md)
[▲ Previous: `if`-`else` conditional statement](./if_else.md)
[▼ Next: `while` loop statement](./while.md)
