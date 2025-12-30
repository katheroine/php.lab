[⌂ Home](../../../README.md)
[▲ Previous: Logical operators](./logical_operators.md)

# String operators

There are two **string operators**. The first is the *concatenation operator* (`.`), which returns the *concatenation* of its right and left arguments. The second is the *concatenating assignment operator* (`.=`), which appends the argument on the right side to the argument on the left side.

*Example: String concatenating*

```php
<?php
$a = "Hello ";
$b = $a . "World!"; // now $b contains "Hello World!"
var_dump($b);

$a = "Hello ";
$a .= "World!";     // now $a contains "Hello World!"
var_dump($a);
?>
```

[▵ Up](#string-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Logical operators](./logical_operators.md)
