[⌂ Home](../../../README.md)
[▲ Previous: `if`-`elseif`-`else` conditional statement](./if_elseif_else.md)
[▼ Next: `match` conditional expression](./match.md)

# `switch` conditional statement

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

The *`switch` statement* is similar to a series of *`if` statements* on the same expression. In many occasions, you may want to compare the same variable (or expression) with many different values, and execute a different piece of code depending on which value it equals to. This is exactly what the *`switch` statement* is for.

Note: Note that unlike some other languages, the *`continue` statement* applies to `switch` and acts similar to `break`. If you have a `switch` inside a loop and wish to continue to the next iteration of the outer loop, use `continue 2`.

Note:

Note that `switch`/`case` does loose comparison.

In the following example, each code block is equivalent. One uses a series of `if` and `elseif` statements, and the other a *`switch` statement*. In each `case`, the output is the same.

*Example: `switch` structure*

```php
<?php
// This switch statement:

switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}

// Is equivalent to:

if ($i == 0) {
    echo "i equals 0";
} elseif ($i == 1) {
    echo "i equals 1";
} elseif ($i == 2) {
    echo "i equals 2";
}
?>
```

It is important to understand how the *`switch` statement* is executed in order to avoid mistakes. The *`switch` statement* executes line by line (actually, statement by statement). In the beginning, no code is executed. Only when a *`case` statement* is found whose expression evaluates to a value that matches the value of the *`switch` expression* does PHP begin to execute the statements. PHP continues to execute the statements until the end of the *`switch` block*, or the first time it sees a *`break` statement*. If you don't write a *`break` statement* at the end of a *`case` statement* list, PHP will go on executing the statements of the following case. For example:

```php
<?php
switch ($i) {
    case 0:
        echo "i equals 0";
    case 1:
        echo "i equals 1";
    case 2:
        echo "i equals 2";
}
?>
```

Here, if `$i` is equal to `0`, PHP would execute all of the `echo` statements! If `$i` is equal to `1`, PHP would execute the last two `echo` statements. You would get the expected behavior (`i equals 2` would be displayed) only if `$i` is equal to `2`. Thus, it is important not to forget *`break` statements* (even though you may want to avoid supplying them on purpose under certain circumstances).

In a *`switch` statement*, the condition is evaluated only once and the result is compared to each *`case` statement*. In an *`elseif` statement*, the *condition* is evaluated again. If your *condition* is more complicated than a simple compare and/or is in a tight loop, a `switch` may be faster.

The statement list for a `case` can also be empty, which simply passes control into the statement list for the next `case`.

```php
<?php
switch ($i) {
    case 0:
    case 1:
    case 2:
        echo "i is less than 3 but not negative";
        break;
    case 3:
        echo "i is 3";
}
?>
```

A special case is the *default `case`*. This `case` matches anything that wasn't matched by the other cases. For example:

```php
<?php
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
       echo "i is not equal to 0, 1 or 2";
}
?>
```

Note: Multiple *default cases* will raise a `E_COMPILE_ERROR` error.

Note: Technically the *default `case`* may be listed in any order. It will only be used if no other case matches. However, by convention it is best to place it at the end as the last branch.

If no *`case` branch* matches, and there is no *default branch*, then no code will be executed, just as `if` no *`if` statement* was `true`.

A *`case` value* may be given as an expression. However, that expression will be evaluated on its own and then *loosely compared* with the `*switch` value*. That means it cannot be used for complex evaluations of the *`switch` value*. For example:

```php
<?php
$target = 1;
$start = 3;

switch ($target) {
    case $start - 1:
        print "A";
        break;
    case $start - 2:
        print "B";
        break;
    case $start - 3:
        print "C";
        break;
    case $start - 4:
        print "D";
        break;
}

// Prints "B"
?>
```

For more complex comparisons, the value `true` may be used as the *`switch` value*. Or, alternatively, `if`-`else` blocks instead of `switch`.

```php
<?php
$offset = 1;
$start = 3;

switch (true) {
    case $start - $offset === 1:
        print "A";
        break;
    case $start - $offset === 2:
        print "B";
        break;
    case $start - $offset === 3:
        print "C";
        break;
    case $start - $offset === 4:
        print "D";
        break;
}

// Prints "B"
?>
```

The alternative syntax for control structures is supported with switches.

```php
<?php
switch ($i):
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
        echo "i is not equal to 0, 1 or 2";
endswitch;
?>
```

It's possible to use a semicolon instead of a colon after a case like:

```php
<?php
switch($beer)
{
    case 'tuborg';
    case 'carlsberg';
    case 'stella';
    case 'heineken';
        echo 'Good choice';
        break;
    default;
        echo 'Please make a new selection...';
        break;
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/control-structures.switch.php)

## Example

```php
<?php

$now = "afternoon";

switch ($now) {
  case "morning":
    print("Good morning!\n");
    break;
  case "afternoon":
    print("Good afternoon!\n");
    break;
  case "evening":
    print("Good evening!\n");
    break;
  case "night":
    print("Good evening!\n");
    break;
}

$now = "evening";

switch ($now) {
  case "morning":
    print("Good morning!\n");
    break;
  case "afternoon":
    print("Good afternoon!\n");
    break;
  case "evening":
  case "night":
    print("Good evening!\n");
    break;
}

$now = "other";

switch ($now) {
  case "morning":
    print("Good morning!\n");
    break;
  case "afternoon":
    print("Good afternoon!\n");
    break;
  case "evening":
    print("Good evening!\n");
    break;
  case "night":
    print("Good evening!\n");
    break;
  default:
    print("Hello!\n");
    break;
}

```

**View**:
[Example](../../../example/code/control_flow/switch/switch.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Good afternoon!
Good evening!
Hello!
```

## Alternative syntax

The following example shows the shortened form for HTML templates.

```php
<?php

$now = "morning";

switch ($now):
  case "morning":
    print("Good morning!\n");
    break;
  case "afternoon":
    print("Good afternoon!\n");
    break;
  case "evening":
    print("Good evening!\n");
    break;
  case "night":
    print("Good evening!\n");
    break;
  default:
    print("Hello!\n");
    break;
endswitch;

```

**View**:
[Example](../../../example/code/control_flow/switch/switch_alternative_syntax.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Good morning!
```

[▵ Up](#switch-conditional-statement)
[⌂ Home](../../../README.md)
[▲ Previous: `if`-`elseif`-`else` conditional statement](./if_elseif_else.md)
[▼ Next: `match` conditional expression](./match.md)
