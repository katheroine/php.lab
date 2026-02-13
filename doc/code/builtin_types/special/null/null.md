[⌂ Home](../../../../../README.md)
[▲ Previous: `goto` instruction](../../../control_flow/goto.md)
[▼ Next: Resources](../../special/resources/resources.md)

# Null

## Description

The **`null` type** is PHP's *unit type*, i.e. it has only one value: `null`.

Undefined, and `unset()` variables will resolve to the value `null`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.null.php)

*Example: Null type*

```php
<?php

$someNothing = null;

print("Information:\n");
var_dump($someNothing);
print('Type: ' . gettype($someNothing) . PHP_EOL);
print("As string: {$someNothing}\n");

```

**Result (PHP 8.4)**:

```
Information:
NULL
Type: NULL
As string:
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/null.php)

## Syntax

There is only one value of type `null`, and that is the case-insensitive *constant `null`*.

```php
<?php
$var = NULL;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.null.php)

PHP *keywords* are case-insensitive. Therefore, `NULL` is also case-insensitive. It means that you can use `null`, `Null`, or `NULL` to represent the `null` value. For example:

```php
<?php

$email = null;
$first_name = Null;
$last_name = NULL;
```

It’s a good practice to keep your code consistent. If you use null in the lowercase in one place, you should also use it in your whole codebase.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-null/#php-null-and-case-sensitivity)

*Example: Null syntax and case sensitivity*

```php
<?php

$someNothing = null;
$otherNothing = NULL;

print("null: ");
var_dump($someNothing);

print("NULL: ");
var_dump($otherNothing);

```

**Result (PHP 8.4)**:

```
null: NULL
NULL: NULL
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/null_syntax.php)

## Usage

*Example: Undefined value use case*

```php
<?php

$user = [
    'name' => null,
    'age' => 30,
    'email' => null
];

if ($user['name'] === null) {
    echo "Username is missing.\n";
} else {
    echo "Welcome, " . $user['name'] . ".\n";
}

```

**Result (PHP 8.4)**:

```
Username is missing.
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/use_cases/null_use_case_undefined_value.php)

*Example: Database query with no result use case*

```php
<?php

function findUserById($id) {
    $users = [
        1 => 'Alice',
        2 => 'Bob'
    ];

    return $users[$id] ?? null;
}

$user = findUserById(999);

if ($user === null) {
    echo "User not found.\n";
} else {
    echo "User: $user" . PHP_EOL;
}

```

**Result (PHP 8.4)**:

```
User not found.
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/use_cases/null_use_case_database_query_no_result.php)

## Testing for null

To check if a variable is null or not, you use the `is_null()` function. The `is_null()` function returns `true` if a variable is `null`; otherwise, it returns `false`. For example:

```php
<?php

$email = null;
var_dump(is_null($email)); // bool(true)

$home = 'phptutorial.net';
var_dump(is_null($home)); // bool(false)
```

To test if a variable is `null` or not, you can also use the *identical operator* `===`. For example:

```php
<?php

$email = null;
$result = ($email === null);
var_dump($result); // bool(true)

$home= 'phptutorial.net';
$result = ($home === null);
var_dump($result); // bool(false)
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-null/#testing-for-null)

*Example: Testing for null*

```php
<?php

$someNothing = null;

print('Type of nothing: ' . gettype($someNothing) . PHP_EOL);
print('Is null? ' . (is_null($someNothing) ? 'yes' : 'no') . PHP_EOL);
print('Is null? ' . (($someNothing === null) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is null? ' . (is_null($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is null? ' . (($someValue === null) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type of nothing: NULL
Is null? yes
Is null? yes

Type of value: integer
Is null? no
Is null? no

```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/testing_for_null.php)

## Casting to `null`

Warning

This feature has been DEPRECATED as of PHP 7.2.0, and REMOVED as of PHP 8.0.0. Relying on this feature is highly discouraged.

Casting a variable to `null` using `(unset) $var` will not remove the variable or unset its value. It will only return a `null` value.

-- [PHP Reference](https://www.php.net/manual/en/language.types.null.php)

*Example: Null as `unset` effect*

```php
<?php

$someValue = 10;

print("Some value: ");
var_dump($someValue);

unset($someValue);

print("Some value after unset: ");
var_dump($someValue);
// PHP Warning:  Undefined variable $someValue

```

**Result (PHP 8.4)**:

```
Some value: int(10)
Some value after unset: PHP Warning:  Undefined variable $someValue on line 11
NULL
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/null_as_unset_effect.php)

## Casting from `null`

*Example: Casting from null*

```php
<?php

$someNothing = null;

$toBool = (bool) $someNothing;
print("To bool: ");
var_dump($toBool);
print(PHP_EOL);

$toInteger = (int) $someNothing;
print("To integer: ");
var_dump($toInteger);
print(PHP_EOL);

$toFloat = (float) $someNothing;
print("To float: ");
var_dump($toFloat);
print(PHP_EOL);

$toString = (string) $someNothing;
print("To string: ");
var_dump($toString);
print(PHP_EOL);

$toArray = (array) $someNothing;
print("To array:\n");
var_dump($toArray);
print(PHP_EOL);

$toObject = (object) $someNothing;
print("To object:\n");
var_dump($toObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
To bool: bool(false)

To integer: int(0)

To float: float(0)

To string: string(0) ""

To array:
array(0) {
}

To object:
object(stdClass)#1 (0) {
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/null/casting_from_null.php)

[▵ Up](#null)
[⌂ Home](../../../../../README.md)
[▲ Previous: `goto` instruction](../../../control_flow/goto.md)
[▼ Next: Resources](../../special/resources/resources.md)
