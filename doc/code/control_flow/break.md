[⌂ Home](../../../README.md)
[▲ Previous: `for` loop statement](./for.md)

# `break` instruction

## Availability

PHP 4, PHP 5, PHP 7, PHP 8

## Usage

`break` ends execution of the current `for`, `foreach`, `while`, `do`-`while` or `switch` structure.

`break` accepts an *optional numeric argument* which tells it how many nested enclosing structures are to be broken out of. The *default value* is `1`, only the immediate enclosing structure is broken out of.

```php
<?php
$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
    }
    echo "$val<br />\n";
}

/* Using the optional argument. */

$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "At 5<br />\n";
            break 1;  /* Exit only the switch. */
        case 10:
            echo "At 10; quitting<br />\n";
            break 2;  /* Exit the switch and the while. */
        default:
            break;
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/control-structures.break.php)

## Example

```php
<?php

$i = 0;

while ($i < 10)
{
  print($i++ . "...\n");

  if ($i > 5)
    break;
}

```

**View**:
[Example](../../../example/code/control_flow/break/break.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
0...
1...
2...
3...
4...
5...
```

[▵ Up](#break-instruction)
[⌂ Home](../../../README.md)
