[⌂ Home](../../../README.md)
[▲ Previous: `goto` instruction](../control_flow/goto.md)
[▼ Next: Booleans](../booleans/booleans.md)

# Null

The **`null` type** is PHP's *unit type*, i.e. it has only one value: `null`.

Undefined, and `unset()` variables will resolve to the value `null`.

## Syntax

There is only one value of type `null`, and that is the case-insensitive *constant `null`*.

```php
<?php
$var = NULL;
?>
```

## Casting to `null`

Warning

This feature has been DEPRECATED as of PHP 7.2.0, and REMOVED as of PHP 8.0.0. Relying on this feature is highly discouraged.

Casting a variable to `null` using `(unset) $var` will not remove the variable or unset its value. It will only return a `null` value.

-- [PHP Reference](https://www.php.net/manual/en/language.types.null.php)

## Example

```php
<?php

$someNothing = null;
$otherNothing = NULL;

print("Some nothing: {$someNothing}\n");
var_dump($someNothing);

print("Other nothing: {$otherNothing}\n");
var_dump($otherNothing);

```

**View**:
[Example](../../../example/code/null/null.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

```
Some nothing:
NULL
Other nothing:
NULL
```

[▵ Up](#null)
[⌂ Home](../../../README.md)
[▲ Previous: `goto` instruction](../control_flow/goto.md)
[▼ Next: Booleans](../booleans/booleans.md)
