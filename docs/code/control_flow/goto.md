[⌂ Home](../../../README.md)
[▲ Previous: `continue` instruction](./continue.md)
[▼ Next: Null](../null/null.md)

# `goto` instruction

## Availability

PHP 5 >= 5.3.0, PHP 7, PHP 8

## Usage

The **`goto` operator** can be used to jump to another section in the program. The target point is specified by a case-sensitive label followed by a colon, and the instruction is given as `goto` followed by the desired *target label*. This is not a full unrestricted `goto`. The *target label* must be within the same file and context, meaning that you cannot jump out of a function or method, nor can you jump into one. You also cannot jump into any sort of loop or *`switch` structure*. You may jump out of these, and a common use is to use a `goto` in place of a multi-level `break`.

*Example: `goto` example*

```php
<?php

goto a;
echo 'Foo';

a:
echo 'Bar';

?>
```

The above example will output:

```
Bar
```

*Example: `goto` loop example*

```php
<?php

for ($i = 0, $j = 50; $i < 100; $i++) {
    while ($j--) {
        if ($j == 17) {
            goto end;
        }
    }
}
echo "i = $i";
end:
echo 'j hit 17';

?>
```

The above example will output:

```
j hit 17
```

*Example: This will not work*

```php
<?php

goto loop;
for ($i = 0, $j = 50; $i < 100; $i++) {
    while ($j--) {
        loop:
    }
}
echo "$i = $i";

?>
```

The above example will output:

```
Fatal error: 'goto' into loop or switch statement is disallowed in
script on line 2
```

-- [PHP Reference](https://www.php.net/manual/en/control-structures.goto.php)

## Example

```php
<?php

$c = 10;
$a = 0;

start:
$a += $c;
$c--;
if ($c == 0)
  goto stop;
goto start;

stop:
print($a . "\n");

```

**View**:
[Example](../../../example/code/control_flow/goto/goto.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
55
```

[▵ Up](#goto-instruction)
[⌂ Home](../../../README.md)
[▲ Previous: `continue` instruction](./continue.md)
[▼ Next: Null](../null/null.md)
