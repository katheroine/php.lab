[⌂ Home](../../../README.md)
[▲ Previous: `while` loop statement](./while.md)

# `do`-`while` loop statement

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

*`do`-`while` loops* are very similar to *`while` loops*, except *the truth expression is checked at the end of each iteration* instead of in the beginning. The main difference from regular *`while` loops* is that the first iteration of a *`do`-`while` loop* is guaranteed to run (the truth expression is only checked at the end of the iteration), whereas it may not necessarily run with a regular *`while` loop* (the truth expression is checked at the beginning of each iteration, if it evaluates to false right from the beginning, the loop execution would end immediately).

There is just one syntax for *`do`-`while` loops*:

```php
<?php
$i = 0;
do {
    echo $i;
} while ($i > 0);
?>
```

The above loop would run one time exactly, since after the first iteration, when truth expression is checked, it evaluates to `false` (`$i` is not bigger than `0`) and the loop execution ends.

Advanced C users may be familiar with a different usage of the *`do`-`while` loop*, to allow stopping execution in the middle of code blocks, by encapsulating them with `do` - `while (0)`, and using the *`break` statement*. The following code fragment demonstrates this:

```php
<?php
do {
    if ($i < 5) {
        echo "i is not big enough";
        break;
    }
    $i *= $factor;
    if ($i < $minimum_limit) {
        break;
    }
   echo "i is ok";

    /* process i */

} while (0);
?>
```

It is possible to use the *`goto` operator* instead of this hack.

-- [PHP Reference](https://www.php.net/manual/en/control-structures.do.while.php)

## Example

```php
<?php

$i = 0;

do {
  echo("{$i}...\n");
  ++$i;
} while ($i < 10);

```

**View**:
[Example](../../../example/code/control_flow/while/do_while.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
0...
1...
2...
3...
4...
5...
6...
7...
8...
9...
```

## Formatting

The following example shows the all possible formating of the statement (but not all are compliant with the official PHP formatting standards).

```php
<?php

$i = 0;

do {
  print("{$i}...\n");
  ++$i;
} while ($i < 10);

print "\n";

$i = 0;

do {
  print($i++ . "...\n");
} while ($i < 10);

print "\n";

$i = 0;

do
  print($i++ . "...\n");
while ($i < 10);

print "\n";

$i = 0;

do print($i++ . "...\n"); while ($i < 10);

print "\n";

```

**View**:
[Example](../../../example/code/control_flow/while/do_while_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
0...
1...
2...
3...
4...
5...
6...
7...
8...
9...

0...
1...
2...
3...
4...
5...
6...
7...
8...
9...

0...
1...
2...
3...
4...
5...
6...
7...
8...
9...

0...
1...
2...
3...
4...
5...
6...
7...
8...
9...

```

[▵ Up](#do---while-loop-statement)
[⌂ Home](../../../README.md)
[▲ Previous: `while` loop statement](./while.md)
