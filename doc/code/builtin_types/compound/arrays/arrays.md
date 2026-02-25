[⌂ Home](../../../../../README.md)
[▲ Previous: Strings](../../scalar/strings/strings.md)
[▼ Next: Objects](../objects/objects.md)

# Arrays

An **array** in PHP is actually an *ordered map*. A *map* is a type that associates *values* to *keys*. This type is optimized for several different uses; it can be treated as an *array*, *list* (*vector*), *hash table* (an implementation of a *map*), *dictionary*, *collection*, *stack*, *queue*, and probably more. As *array* values can be other *arrays*, *trees* and *multidimensional arrays* are also possible.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

By definition, an **array** is a list of *elements*. For example, you may have an array that contains a list of products.

PHP provides you with two types of arrays:

* Indexed arrays
* Associative arrays

The keys of the indexed array are integers that start at 0. Typically, you use indexed arrays to access the elements by their positions.

The keys of an associative array are strings. You use associative arrays when you want to access elements by string keys.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#introduction-to-php-arrays)

*Example: Array type*

```php
<?php

$someArray = [null, true, 3, 'orange'];
$someAssociativeArray = [
    'some_key' => 'some value',
    'otherKey' => 1024,
    10 => true,
];

print("Information:\n");
var_dump($someArray);
print('Type: ' . gettype($someArray) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($someAssociativeArray);
print('Type: ' . gettype($someAssociativeArray) . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Information:
array(4) {
  [0]=>
  NULL
  [1]=>
  bool(true)
  [2]=>
  int(3)
  [3]=>
  string(6) "orange"
}
Type: array

Information:
array(3) {
  ["some_key"]=>
  string(9) "some value"
  ["otherKey"]=>
  int(1024)
  [10]=>
  bool(true)
}
Type: array

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array.php)

## Syntax

```php
<?php

$someArrayClassic = array(true, 15, 'hello');
$someAssociativeArrayClassic = [
    'some_key' => 'some value',
    3 => 10.5,
    5.6 => false,
];

print("Classic array():\n");
var_dump($someArrayClassic);
print("Classic associative array():\n");
var_dump($someAssociativeArrayClassic);

print(PHP_EOL);

$someArrayContemporary = [3, 20, false];
$someAssociativeArrayContemporary = [
    'otherKey' => 'ok',
    2 => 1024,
];

print("Contemporary []:\n");
var_dump($someArrayClassic);
print("Contemporary associative []:\n");
var_dump($someAssociativeArrayContemporary);

print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Classic array():
array(3) {
  [0]=>
  bool(true)
  [1]=>
  int(15)
  [2]=>
  string(5) "hello"
}
Classic associative array():
array(3) {
  ["some_key"]=>
  string(9) "some value"
  [3]=>
  float(10.5)
  [5]=>
  bool(false)
}

Contemporary []:
array(3) {
  [0]=>
  bool(true)
  [1]=>
  int(15)
  [2]=>
  string(5) "hello"
}
Contemporary associative []:
array(2) {
  ["otherKey"]=>
  string(2) "ok"
  [2]=>
  int(1024)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_syntax.php)

## Array definition and initialisation

*Example: Array definition and initialisation*

```php
<?php

$array_1 = [];

print("Not initialised, defined as empty by []:\n\n");
print_r($array_1); print("\n");

$array_2 = array();

print("Not initialised, defined as empty by array():\n\n");
print_r($array_2); print("\n");

$array_3 = [2, 4, 6];

print("Initialised, defined as 3-element by []:\n\n");
print_r($array_3); print("\n");

$array_4 = array(3, 5, 7);

print("Initialised, defined as 3-element by array():\n\n");
print_r($array_4); print("\n");

$array_5 = range(1, 3);
print("Initialised, defined as 3-element by range():\n\n");
print_r($array_5); print("\n");

$array_6 = [
  'one' => 1,
  'two' => '2',
  'three' => '***',
];
print("Initialised, defined as 3-element associative by []:\n\n");
print_r($array_6); print("\n");

$array_7 = array(
  'three' => '######',
  "3" => 5.5,
  4
);
print("Initialised, defined as 3-element partially associative by array():\n\n");
print_r($array_7); print("\n");

$city = 'Twin Peaks';
$street = 'Hundret Acre Wood';
$house = [
  'no' => 6,
  'flat_no' => 127
];

$array_8 = compact('city', 'street', 'house');
print("Initialised, defined as 3-element associative by compact():\n\n");
print_r($array_8); print("\n");

```

**Result (PHP 8.4)**:

```
Not initialised, defined as empty by []:

Array
(
)

Not initialised, defined as empty by array():

Array
(
)

Initialised, defined as 3-element by []:

Array
(
    [0] => 2
    [1] => 4
    [2] => 6
)

Initialised, defined as 3-element by array():

Array
(
    [0] => 3
    [1] => 5
    [2] => 7
)

Initialised, defined as 3-element by range():

Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)

Initialised, defined as 3-element associative by []:

Array
(
    [one] => 1
    [two] => 2
    [three] => ***
)

Initialised, defined as 3-element partially associative by array():

Array
(
    [three] => ######
    [3] => 5.5
    [4] => 4
)

Initialised, defined as 3-element associative by compact():

Array
(
    [city] => Twin Peaks
    [street] => Hundret Acre Wood
    [house] => Array
        (
            [no] => 6
            [flat_no] => 127
        )

)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_definition_and_initialisation.php)

## Array assignment and overwritting

*Example Array assignment and overwritting*

```php
<?php

$array = [];

print("Not initialised, before assignments: \$array = []\n\n");
print_r($array); print("\n");

$array = [0, 0, 0];

print("Initialised, before assignments: \$array = [0, 0, 0]\n\n");
print_r($array); print("\n");

$array = [1, 2];

print("After assignment: \$array = [1, 2]\n\n");
print_r($array); print("\n");

$array[1] = 3;

print("After overwriting element: \$array[1] = 3\n\n");
print_r($array); print("\n");

$array[] = 4;

print("After overwriting by adding element: \$array[] = 4\n\n");
print_r($array); print("\n");

```

**Result (PHP 8.4)**:

```
Not initialised, before assignments: $array = []

Array
(
)

Initialised, before assignments: $array = [0, 0, 0]

Array
(
    [0] => 0
    [1] => 0
    [2] => 0
)

After assignment: $array = [1, 2]

Array
(
    [0] => 1
    [1] => 2
)

After overwriting element: $array[1] = 3

Array
(
    [0] => 1
    [1] => 3
)

After overwriting by adding element: $array[] = 4

Array
(
    [0] => 1
    [1] => 3
    [2] => 4
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_assignment_and_overwriting.php)

## Creating arrays

In PHP, you can use the array() construct or [] syntax to define an array. The [] syntax is shorter and more convenient.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#creating-arrays)

A *short array syntax* exists which replaces `array()` with `[]`.

*Example: A simple array*

```php
<?php
$array1 = array(
    "foo" => "bar",
    "bar" => "foo",
);

// Using the short array syntax
$array2 = [
    "foo" => "bar",
    "bar" => "foo",
];

var_dump($array1, $array2);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

### Creating an array with the `array()` construct

To define an *array*, you use the `array()` construct. The following example creates an *empty array*:

```php
<?php

$empty_array = array();
```

To create an *array* with some *initial elements*, you place a comma-separated list of *elements* within parentheses of the `array()` construct.

For example, the following defines an *array* that has three numbers:

```php
<?php

$scores = array(1, 2, 3);
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#creating-an-array-using-the-array-construct)

An `array` can be created using the `array()` language construct. It takes any number of comma-separated `key => value` pairs as arguments.

```php
array(
    key  => value,
    key2 => value2,
    key3 => value3,
    ...
)
```

The comma after the last array element is optional and can be omitted. This is usually done for single-line *arrays*, i.e. `array(1, 2)` is preferred over `array(1, 2, )`. For multi-line *arrays* on the other hand the trailing comma is commonly used, as it allows easier addition of new *elements* at the end.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

### Creating an array with the [] syntax

PHP provides a more convenient way to define *arrays* with the shorter syntax `[]`, known as *JSON notation*.

The following example uses `[]` syntax to create a new *empty array*:

```php
<?php

$empty_array = [];
```

The following example uses the `[]` syntax to create a new *array* that consists of three numbers:

```php
<?php

$scores = [1, 2, 3];
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#creating-an-array-using-the-syntax)

*Example: Array creating*

```php
<?php

$someEmptyArray = [];
$someIndexedArray = [10, 'penguin', true];
$someAssociativeArray = [
    'some_key' => 'some value',
    2 => 3,
    'otherKey' => null,
];

print("Empty array:\n");
var_dump($someEmptyArray);
print(PHP_EOL);

print("Indexed array:\n");
var_dump($someIndexedArray);
print(PHP_EOL);

print("Associative array:\n");
var_dump($someAssociativeArray);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Empty array:
array(0) {
}

Indexed array:
array(3) {
  [0]=>
  int(10)
  [1]=>
  string(7) "penguin"
  [2]=>
  bool(true)
}

Associative array:
array(3) {
  ["some_key"]=>
  string(9) "some value"
  [2]=>
  int(3)
  ["otherKey"]=>
  NULL
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_creating.php)

## Displaying arrays

To show the contents of an *array*, you use the `var_dump()` function. For example:

```php
<?php

$scores = [1, 2, 3];
var_dump($scores);
```

Output:

```
array(3) {
  [0]=> int(1)
  [1]=> int(2)
  [2]=> int(3)
}
```

Or you can use the `print_r()` function:

```php
<?php

$scores = array(1, 2, 3);
print_r($scores);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
```

To make the output more readable, you can wrap the output of the `print_r(`) function inside a `<pre>` tag. For example:

```php
<?php

$scores = [1, 2, 3];

echo '<pre>';
print_r($scores);
echo '</pre>';
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
```

It’s more convenient to define a *function* that prints out an *array* like this:

```php
<?php

function print_array($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

$scores = [1, 2, 3];

print_array($scores);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
```

And then you can reuse the function whenever you want to display an *array*.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#displaying-arrays)

*Example: Array displaying*

```php
<?php

$someArray = [10, 'penguin', true];
$otherArray = [
    'some_key' => 'some value',
    2 => 3,
    'otherKey' => null,
];

print("Some array:\n");
var_dump($someArray);
print(PHP_EOL);
print_r($someArray);
print(PHP_EOL);

print("Other array:\n");
var_dump($otherArray);
print(PHP_EOL);
print_r($otherArray);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some array:
array(3) {
  [0]=>
  int(10)
  [1]=>
  string(7) "penguin"
  [2]=>
  bool(true)
}

Array
(
    [0] => 10
    [1] => penguin
    [2] => 1
)

Other array:
array(3) {
  ["some_key"]=>
  string(9) "some value"
  [2]=>
  int(3)
  ["otherKey"]=>
  NULL
}

Array
(
    [some_key] => some value
    [2] => 3
    [otherKey] =>
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_displaying.php)

## Modifying arrays

An existing *array* can be modified by explicitly setting values in it.

This is done by assigning *values* to the *array*, specifying the *key* in brackets. The *key* can also be omitted, resulting in an empty pair of brackets (`[]`).

```php
$arr[key] = value;
$arr[] = value;
// key may be an int or string
// value may be any value of any type
```

If `$arr` doesn't exist yet or is set to `null` or `false`, it will be created, so this is also an alternative way to create an *array*. This practice is however discouraged because if `$arr` already contains some value (e.g. *string* from request variable) then this value will stay in the place and `[]` may actually stand for *string access operator*. It is always better to initialize a variable by a direct assignment.

Note: As of PHP 7.1.0, applying the empty *index operator* on a *string* throws a fatal error. Formerly, the *string* was silently *converted* to an *array*.

***Note: As of PHP 8.1.0, creating a new *array* from `false` value is deprecated. Creating a new *array* from `null` and undefined values is still allowed.***

***To change a certain *value*, assign a new *value* to that *element* using its *key*. To remove a *key*/*value* pair, call the `unset()` function on it.***

*Example: Using square brackets with arrays*

```php
<?php
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
                // at this point of the script

$arr["x"] = 42; // This adds a new element to
                // the array with key "x"

unset($arr[5]); // This removes the element from the array

var_dump($arr);

unset($arr);    // This deletes the whole array

var_dump($arr);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array modifying*

```php
<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'otherKey' => null,
];

var_dump($someArray);
print(PHP_EOL);

$someArray[1] = 'hello';
$someArray['some_key'] = 1024;

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 16;
$someArray[] = 'coffee';

var_dump($someArray);
print(PHP_EOL);

unset($someArray[2]);
unset($someArray['otherKey']);

var_dump($someArray);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
array(4) {
  [1]=>
  float(15.5)
  ["some_key"]=>
  string(9) "some value"
  [2]=>
  int(3)
  ["otherKey"]=>
  NULL
}

array(4) {
  [1]=>
  string(5) "hello"
  ["some_key"]=>
  int(1024)
  [2]=>
  int(3)
  ["otherKey"]=>
  NULL
}

array(6) {
  [1]=>
  string(5) "hello"
  ["some_key"]=>
  int(1024)
  [2]=>
  int(3)
  ["otherKey"]=>
  NULL
  [3]=>
  int(16)
  [4]=>
  string(6) "coffee"
}

array(4) {
  [1]=>
  string(5) "hello"
  ["some_key"]=>
  int(1024)
  [3]=>
  int(16)
  [4]=>
  string(6) "coffee"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_modifying.php)

## Destroying arrays

*Example: Array destroying*

```php
<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
];

var_dump(isset($someArray));
var_dump($someArray);
print(PHP_EOL);

unset($someArray);

var_dump(isset($someArray));
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
bool(true)
array(4) {
  [1]=>
  float(15.5)
  ["some_key"]=>
  string(10) "some value"
  [2]=>
  int(3)
  ["other_key"]=>
  NULL
}

bool(false)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_destroying.php)

## Array values

*Example: Array values*

```php
<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
    5 => 'other value'
];

print("Array:\n");
var_dump($someArray);
print(PHP_EOL);

$arrayValues = array_values($someArray);

print("Values:\n");
var_dump($arrayValues);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Array:
array(5) {
  [1]=>
  float(15.5)
  ["some_key"]=>
  string(10) "some value"
  [2]=>
  int(3)
  ["other_key"]=>
  NULL
  [5]=>
  string(11) "other value"
}

Values:
array(5) {
  [0]=>
  float(15.5)
  [1]=>
  string(10) "some value"
  [2]=>
  int(3)
  [3]=>
  NULL
  [4]=>
  string(11) "other value"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_values.php)

## Array indexes and keys

The *key* can either be an `int` or a `string`. The *value* can be of any *type*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array keys*

```php
<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
    5 => 'other value'
];

print("Array:\n");
var_dump($someArray);
print(PHP_EOL);

$arrayKeys = array_keys($someArray);

print("Keys:\n");
var_dump($arrayKeys);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Array:
array(5) {
  [1]=>
  float(15.5)
  ["some_key"]=>
  string(10) "some value"
  [2]=>
  int(3)
  ["other_key"]=>
  NULL
  [5]=>
  string(11) "other value"
}

Values:
array(5) {
  [0]=>
  float(15.5)
  [1]=>
  string(10) "some value"
  [2]=>
  int(3)
  [3]=>
  NULL
  [4]=>
  string(11) "other value"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_keys.php)

Additionally the following *key casts* will occur:

* *Strings* containing valid *decimal ints*, unless the number is preceded by a `+` sign, will be cast to the `int` type. E.g. the key `"8"` will actually be stored under `8`. On the other hand `"08"` will not be cast, as it isn't a valid *decimal integer*.
* *Floats* are also cast to *ints*, which means that the fractional part will be truncated. E.g. the key `8.7` will actually be stored under `8`.
* *Bools* are cast to *ints*, too, i.e. the *key* `true` will actually be stored under `1` and the key `false` under `0`.
* *Null* will be cast to the *empty string*, i.e. the key `null` will actually be stored under `""`.
* *Arrays* and objects can not be used as *keys*. Doing so will result in a warning: `Illegal offset type`.

If multiple elements in the `array` declaration use the same *key*, only the last one will be used as all others are overwritten.

*Example: Type Casting and Overwriting example*

```php
<?php
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);
var_dump($array);
?>
```

The above example will output:

```
array(1) {
  [1]=>
  string(1) "d"
}
```

As all the *keys* in the above example are cast to `1`, the *value* will be overwritten on every new *element* and the last assigned *value* `"d"` is the only one left over.

PHP arrays can contain `int` and `string` *keys* at the same time as PHP does not distinguish between *indexed* and *associative arrays*.

*Example: Mixed int and string keys*

```php
<?php
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);
?>
```

The above example will output:

```
array(4) {
  ["foo"]=>
  string(3) "bar"
  ["bar"]=>
  string(3) "foo"
  [100]=>
  int(-100)
  [-100]=>
  int(100)
}
```

The *key* is optional. If it is not specified, PHP will use the increment of the largest previously used `int` *key*.

*Example: Indexed arrays without key*

```php
<?php
$array = array("foo", "bar", "hello", "world");
var_dump($array);
?>
```

The above example will output:

```
array(4) {
  [0]=>
  string(3) "foo"
  [1]=>
  string(3) "bar"
  [2]=>
  string(5) "hello"
  [3]=>
  string(5) "world"
}
```

It is possible to specify the *key* only for some *elements* and leave it out for others:

*Example: Keys not on all elements*

```php
<?php
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
?>
```

The above example will output:

```
array(4) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
  [6]=>
  string(1) "c"
  [7]=>
  string(1) "d"
}
```

As you can see the last value `"d"` was assigned the key `7`. This is because the largest integer key before that was `6`.

*Example: Complex type casting and overwriting example*

This example includes all variations of *type casting* of *keys* and overwriting of *elements*.

```php
<?php
$array = array(
    1    => 'a',
    '1'  => 'b', // the value "a" will be overwritten by "b"
    1.5  => 'c', // the value "b" will be overwritten by "c"
    -1 => 'd',
    '01'  => 'e', // as this is not an integer string it will NOT override the key for 1
    '1.5' => 'f', // as this is not an integer string it will NOT override the key for 1
    true => 'g', // the value "c" will be overwritten by "g"
    false => 'h',
    '' => 'i',
    null => 'j', // the value "i" will be overwritten by "j"
    'k', // value "k" is assigned the key 2. This is because the largest integer key before that was 1
    2 => 'l', // the value "k" will be overwritten by "l"
);

var_dump($array);
?>
```

The above example will output:

```
array(7) {
  [1]=>
  string(1) "g"
  [-1]=>
  string(1) "d"
  ["01"]=>
  string(1) "e"
  ["1.5"]=>
  string(1) "f"
  [0]=>
  string(1) "h"
  [""]=>
  string(1) "j"
  [2]=>
  string(1) "l"
}
```

*Example: Negative index example*

When assigning a negative integer key `n`, PHP will take care to assign the next key to `n+1`.

```php
<?php
$array = [];

$array[-5] = 1;
$array[] = 2;

var_dump($array);
?>
```

The above example will output:

```
array(2) {
  [-5]=>
  int(1)
  [-4]=>
  int(2)
}
```

Warning

Prior to PHP 8.3.0, assigning a negative integer key `n` would assign the next key to `0`, the previous example would therefore output:

```
array(2) {
  [-5]=>
  int(1)
  [0]=>
  int(2)
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array key type casting and overwriting*

```php
<?php

$letters = [
  1    => "a",
  "1"  => "b", // the value "a" will be overwritten by "b"
  1.5  => "c", // the value "b" will be overwritten by "c"
  true => "d", // the values "c" will be overwritten by "d"
];

var_dump($letters);
print("\n");

$values = [
  1    => 'a',
  '1'  => 'b', // the value "a" will be overwritten by "b"
  1.5  => 'c', // the value "b" will be overwritten by "c"
  -1 => 'd',
  '01'  => 'e', // as this is not an integer string it will NOT override the key for 1
  '1.5' => 'f', // as this is not an integer string it will NOT override the key for 1
  true => 'g', // the value "c" will be overwritten by "g"
  false => 'h',
  '' => 'i',
  null => 'j', // the value "i" will be overwritten by "j"
  'k', // value "k" is assigned the key 2. This is because the largest integer key before that was 1
  2 => 'l', // the value "k" will be overwritten by "l"
];

var_dump($values);
print("\n");

```

**Result (PHP 8.4)**:

```
array(1) {
  [1]=>
  string(1) "d"
}

array(7) {
  [1]=>
  string(1) "g"
  [-1]=>
  string(1) "d"
  ["01"]=>
  string(1) "e"
  ["1.5"]=>
  string(1) "f"
  [0]=>
  string(1) "h"
  [""]=>
  string(1) "j"
  [2]=>
  string(1) "l"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_key_type_casting_and_overwriting.php)

## Array elements

*Example: Array elements*

```php
<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);
print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$values = [9.5, 8.5, 7.5];

print("Values:\n\n");
var_dump($values);
print(PHP_EOL);
print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");

$words = ["first", "two", "last"];

print("Words:\n\n");
var_dump($words);
print(PHP_EOL);
print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");

$items = [
  321,
  2.5,
  "orange",
  [2, 4, 6],
  new stdClass,
];

print("Items:\n\n");
var_dump($items);
print(PHP_EOL);
print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n");
print("\$items[3]: {$items[3][0]}, {$items[3][1]}, {$items[3][2]}\n");
print("\$items[4]: " . gettype($items[4]) . "\n\n");

$data = [
  'id' => 1024,
  'programming_language' => 'PHP',
  'database' => 'MongoDB',
  'operating_system' => 'Linux',
];

print("Data:\n\n");
var_dump($data);
print(PHP_EOL);
print("\$data['id']: {$data['id']}\n");
print("\$data['programming_language']: {$data['programming_language']}\n");
print("\$data['database']: {$data['database']}\n");
print("\$data['operating_system']: {$data['operating_system']}\n\n");

```

**Result (PHP 8.4)**:

```
Numbers:

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}

$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

Values:

array(3) {
  [0]=>
  float(9.5)
  [1]=>
  float(8.5)
  [2]=>
  float(7.5)
}

$values[0]: 9.5
$values[1]: 8.5
$values[2]: 7.5

Words:

array(3) {
  [0]=>
  string(5) "first"
  [1]=>
  string(3) "two"
  [2]=>
  string(4) "last"
}

$words[0]: first
$words[1]: two
$words[2]: last

Items:

array(5) {
  [0]=>
  int(321)
  [1]=>
  float(2.5)
  [2]=>
  string(6) "orange"
  [3]=>
  array(3) {
    [0]=>
    int(2)
    [1]=>
    int(4)
    [2]=>
    int(6)
  }
  [4]=>
  object(stdClass)#1 (0) {
  }
}

$items[0]: 321
$items[1]: 2.5
$items[2]: orange
$items[3]: 2, 4, 6
$items[4]: object

Data:

array(4) {
  ["id"]=>
  int(1024)
  ["programming_language"]=>
  string(3) "PHP"
  ["database"]=>
  string(7) "MongoDB"
  ["operating_system"]=>
  string(5) "Linux"
}

$data['id']: 1024
$data['programming_language']: PHP
$data['database']: MongoDB
$data['operating_system']: Linux

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements.php)

### Creating array elements

To add an *element* to an *array*, you use the following syntax:

```php
$array_name[] = new_element;
```

PHP will calculate the highest numerical *index* plus one each time you assign an *element* to the *array*.

The following example shows how to add the number `4` to the `$scores` *array*:

```php
<?php

$scores = [1, 2, 3];
$scores[] = 4;

print_r($scores);
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#adding-an-element-to-the-array)

[...] If no *key* is specified, the maximum of the existing `int` indices is taken, and the new *key* will be that maximum value plus `1` (but at least `0`). If no `int` indices exist yet, the *key* will be `0` (zero).

Note that the maximum integer *key* used for this need not currently exist in the *array*. It need only have existed in the *array* at some time since the last time the *array* was re-indexed. The following example illustrates:

```php
<?php
// Create a simple array.
$array = array(1, 2, 3, 4, 5);
print_r($array);

// Now delete every item, but leave the array itself intact:
foreach ($array as $i => $value) {
    unset($array[$i]);
}
print_r($array);

// Append an item (note that the new key is 5, instead of 0).
$array[] = 6;
print_r($array);

// Re-index:
$array = array_values($array);
$array[] = 7;
print_r($array);
?>
```

The above example will output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
Array
(
)
Array
(
    [5] => 6
)
Array
(
    [0] => 6
    [1] => 7
)
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array element appending with array access operator*

```php
<?php

$someArray = [
    3 => 'hello',
    'key' => 'value',
    1 => 0.5,
];

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 6;

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 'star';

var_dump($someArray);
print(PHP_EOL);

unset($someArray);

$someArray[] = 16;

var_dump($someArray);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
array(3) {
  [3]=>
  string(5) "hello"
  ["key"]=>
  string(5) "value"
  [1]=>
  float(0.5)
}

array(4) {
  [3]=>
  string(5) "hello"
  ["key"]=>
  string(5) "value"
  [1]=>
  float(0.5)
  [4]=>
  int(6)
}

array(5) {
  [3]=>
  string(5) "hello"
  ["key"]=>
  string(5) "value"
  [1]=>
  float(0.5)
  [4]=>
  int(6)
  [5]=>
  string(4) "star"
}

array(1) {
  [0]=>
  int(16)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_element_appending_with_array_access_operator.php)

In this example, we defined an *array* that consists of three numbers initially. Then, we added the number `4` to the *array*.

It’s possible to use an *index* when you add a new *element* to the *array*. For example:

```php
$scores = [1, 2, 3];
$scores[3] = 4;
```

However, to do this, you must manually calculate the new *index*, which is not practical. Also, the value will be overwritten if the index is already used.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#adding-an-element-to-the-array)

*Example: Array elements creating*

```php
<?php

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[] = 6;

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

$amounts = array(3, 6, 9);

print("Amounts:\n\n");
var_dump($amounts);
print(PHP_EOL);

$values = [9.5, 8.5, 7.5];

print("Values:\n\n");
var_dump($values);
print(PHP_EOL);

$items = [2, 'orange'];
$items[0] = 2.5;
$items[4] = 321;

print("Items:\n\n");
var_dump($items);
print(PHP_EOL);

$words = array(
  2 => 'second',
  'which' => 'last',
  1 => "first",
);

print("Words:\n\n");
var_dump($words);
print(PHP_EOL);

$things = [
  1,
  2,
  3 => 4,
  5,
  'key' => 'blue',
];

print("Things:\n\n");
var_dump($things);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Numbers:

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}

Amounts:

array(3) {
  [0]=>
  int(3)
  [1]=>
  int(6)
  [2]=>
  int(9)
}

Values:

array(3) {
  [0]=>
  float(9.5)
  [1]=>
  float(8.5)
  [2]=>
  float(7.5)
}

Items:

array(3) {
  [0]=>
  float(2.5)
  [1]=>
  string(6) "orange"
  [4]=>
  int(321)
}

Words:

array(3) {
  [2]=>
  string(6) "second"
  ["which"]=>
  string(4) "last"
  [1]=>
  string(5) "first"
}

Things:

array(5) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [3]=>
  int(4)
  [4]=>
  int(5)
  ["key"]=>
  string(4) "blue"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements_creating.php)

### Accessing array elements

To access an *element* in an *array*, you specify the *index* of the *element* within the square brackets:

```php
$array_name[index]
```

Note that the *index* of the first *element* of an *array* begins with zero, not one.

The following example shows how to access the first *element* of the *array*:

```php
<?php

$scores = [1, 2, 3];
echo $scores[0];
```

Output:

```
1
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#accessing-array-elements)

*Array elements* can be accessed using the `array[key]` syntax.

*Example: Accessing array elements*

```php
<?php
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
?>
```

The above example will output:

```
string(3) "bar"
int(24)
string(3) "foo"
```

Note:

Prior to PHP 8.0.0, square brackets and curly braces could be used interchangeably for accessing *array elements* (e.g. `$array[42]` and `$array{42}` would both do the same thing in the example above). The curly brace syntax was deprecated as of PHP 7.4.0 and no longer supported as of PHP 8.0.0.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

**Dereferencing** is the action to *access* a *value*, which is *referenced* with a *pointer*. Since PHP has no *pointer*, *dereferencing* applies to *accessing* an *element* in an *array* or an *object*.

-- [PHP Dictionary](php-dictionary.readthedocs.io/en/latest/dictionary/dereferencing.ini.html)

*Example: Array dereferencing*

```php
<?php
function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];

var_dump($secondElement);
?>
```

Note:

Attempting to access an *array key* which has not been defined is the same as accessing any other undefined variable: an `E_WARNING`-level error message (`E_NOTICE`-level prior to PHP 8.0.0) will be issued, and the result will be `null`.

Note:

*Array dereferencing* a scalar value which is not a *string* yields `null`. Prior to PHP 7.4.0, that did not issue an error message. As of PHP 7.4.0, this issues `E_NOTICE`; as of PHP 8.0.0, this issues `E_WARNING`.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array elements accessing*

```php
<?php

$numbers = [];

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("Numbers:\n\n");

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

print("current(\$numbers): " . current($numbers) . "\n");
print("next(\$numbers): " . next($numbers) . "\n");
print("next(\$numbers): " . next($numbers) . "\n\n");

print("current(\$numbers): " . current($numbers) . "\n");
print("prev(\$numbers): " . prev($numbers) . "\n");
print("prev(\$numbers): " . prev($numbers) . "\n\n");

$values = &$numbers;

$values[0] = 1;
$values[1] = 3;
$values[2] = 5;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$items = [];

$items[2] = "Hello, there!";
$items['color'] = 'orange';

print("Items:\n\n");

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n\n");

print("current(\$items): " . current($items) . "\n");
print("next(\$items): " . next($items) . "\n\n");

print("current(\$items): " . current($items) . "\n");
print("prev(\$items): " . prev($items) . "\n\n");

$things = &$items;

$things[2] = "Hi!";
$things['color'] = 'blue';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n\n");

```

**Result (PHP 8.4)**:

```
Numbers:

$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

current($numbers): 2
next($numbers): 4
next($numbers): 6

current($numbers): 6
prev($numbers): 4
prev($numbers): 2

$numbers[0]: 1
$numbers[1]: 3
$numbers[2]: 5

Items:

$items[2]: Hello, there!
$items['color']: orange

current($items): Hello, there!
next($items): orange

current($items): orange
prev($items): Hello, there!

$items[2]: Hi!
$items['color']: blue

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements_accessing.php)

### Modifying array elements

The following statement changes the *element* located at the *index* to the `$new_element`:

```php
$array_name[index] = $new_element;
```

For example, to change the first *element* of the `$scores` *array* from `1` to zero, you do it as follows:

```php
<?php

$scores = [1, 2, 3];
$scores[0] = 0;

print_r($scores);
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#changing-array-elements)

*Example: Array elements modifying*

```php
<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

$numbers[1] = 5;

var_dump($numbers);
print(PHP_EOL);

$values = &$numbers;

$values[2] = 9;

var_dump($numbers);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Numbers:

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(5)
  [2]=>
  int(6)
}

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(5)
  [2]=>
  int(9)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements_modifying.php)

### Destroying array elements

To remove an *element* from an *array*, you use the `unset()` function. The following removes the second *element* of the `$scores` array:

```php
<?php

$scores = [1, 2, 3];
unset($scores[1]);

print_r($scores);
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-array/#removing-array-elements)

*Example: Array elements destroying*

```php
<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

unset($numbers[1]);

var_dump($numbers);
print(PHP_EOL);

$values = &$numbers;

unset($values[2]);

var_dump($numbers);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Numbers:

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}

array(2) {
  [0]=>
  int(2)
  [2]=>
  int(6)
}

array(1) {
  [0]=>
  int(2)
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements_destroying.php)

## Array destructuring

*Arrays* can be *destructured* using the `[]` (as of PHP 7.1.0) or `list()` language constructs. These constructs can be used to *destructure* an *array* into distinct *variables*.

*Example: Array destructuring*

```php
<?php
$source_array = ['foo', 'bar', 'baz'];

[$foo, $bar, $baz] = $source_array;

echo $foo, PHP_EOL;    // prints "foo"
echo $bar, PHP_EOL;    // prints "bar"
echo $baz, PHP_EOL;    // prints "baz"
?>
```

*Array destructuring* can be used in foreach to *destructure* a multi-dimensional *array* while iterating over it.

*Example: Array destructuring in foreach*

```php
<?php
$source_array = [
    [1, 'John'],
    [2, 'Jane'],
];

foreach ($source_array as [$id, $name]) {
    echo "{$id}: '{$name}'\n";
}
?>
```

*Array elements* will be ignored if the *variable* is not provided. *Array destructuring* always starts at index `0`.

*Example: Ignoring elements*

```php
<?php
$source_array = ['foo', 'bar', 'baz'];

// Assign the element at index 2 to the variable $baz
[, , $baz] = $source_array;

echo $baz;    // prints "baz"
?>
```

As of PHP 7.1.0, *associative arrays* can be destructured too. This also allows for easier selection of the right element in numerically indexed arrays as the index can be explicitly specified.

*Example: Destructuring associative arrays*

```php
<?php
$source_array = ['foo' => 1, 'bar' => 2, 'baz' => 3];

// Assign the element at index 'baz' to the variable $three
['baz' => $three] = $source_array;

echo $three, PHP_EOL;  // prints 3

$source_array = ['foo', 'bar', 'baz'];

// Assign the element at index 2 to the variable $baz
[2 => $baz] = $source_array;

echo $baz, PHP_EOL;    // prints "baz"
?>
```

*Array destructuring* can be used for easy swapping of two variables.

*Example: Swapping two variable*

```php
<?php
$a = 1;
$b = 2;

[$b, $a] = [$a, $b];

echo $a, PHP_EOL;    // prints 2
echo $b, PHP_EOL;    // prints 1
?>
```

Note:

The spread operator (`...`) is not supported in assignments.

Note:

Attempting to access an *array* *key* which has not been defined is the same as accessing any other undefined variable: an `E_WARNING`-level error message (`E_NOTICE`-level prior to PHP 8.0.0) will be issued, and the result will be `null`.

Note:

Destructuring a *scalar value* assigns `null` to all variables.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array destructuring*

```php
<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");

list($e1, $e2, $e3) = $numbers;

print("First number: $e1\n");
print("Second number: $e2\n");
print("Third number: $e3\n\n");

list(,,$element3) = $numbers;

print("Third number: $element3\n\n");

list(1 => $element2, 0 => $element1) = $numbers;

print("First number: $element1\n");
print("Second number: $element2\n\n");

print("Items:\n\n");

$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];

list('greetings' => $item1, 'number' => $item2, 'color' => $item3) = $items;

print("First item: $item1\n");
print("Second item: $item2\n");
print("Third item: $item3\n\n");

print("Values:\n\n");

$values = [1, 3, 5, [7.1, 7.3, 7.5]];

list($el1, $el2, $el3, list($nel1, $nel2, $nel3)) = $values;

print("First value: $el1\n");
print("Second value: $el2\n");
print("Third value: $el3\n");
print("First nested value: $nel1\n");
print("Second nested value: $nel2\n");
print("Third nested value: $nel3\n\n");

print("Pairs:\n\n");

$pairs = [
  ['blue', 0x0000FF],
  ['orange', 0xFFA500],
  ['violet', 0x8A2BE2],
];

foreach($pairs as [$name, $value]) {
  print("Name: $name, Value: $value\n");
}

```

**Result (PHP 8.4)**:

```
Numbers:

First number: 2
Second number: 4
Third number: 6

Third number: 6

First number: 2
Second number: 4

Items:

First item: Hello, there!
Second item: 3.14
Third item: orange

Values:

First value: 1
Second value: 3
Third value: 5
First nested value: 7.1
Second nested value: 7.3
Third nested value: 7.5

Pairs:

Name: blue, Value: 255
Name: orange, Value: 16753920
Name: violet, Value: 9055202

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_destructuring.php)

## Array unpacking

### Sperad operator

An *array* prefixed by `...` will be *expanded* in place during *array definition*. Only *arrays* and *objects* which implement `Traversable` can be *expanded*. *Array unpacking* with `...` is available as of PHP 7.4.0. This is also called the ***spread operator***.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

PHP 7.4 introduced the ***spread operator*** to the *array expression*. PHP uses the three dots (`...`) to denote the *spread operator*.

When you prefix an *array* with the *spread operator*, PHP will spread *array elements* in place:

```
...array_var
```

For example:

```php
<?php

$numbers = [4,5];
$scores = [1,2,3, ...$numbers];

print_r($scores);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
```

How it works.

* First, define the `$numbers` *array* that holds two *integers*.
* Second, define the `$scores` *array* of three *integers* `1`, `2`, and `3`. Also, spread *elements* of the `$numbers` *array* into the `$scores` *array*. As a result, the `$score` *array* will contain five numbers `1`, `2`, `3`, `4`, and `5`.

The *spread operator* performs better than the `array_merge()` function because it is a language construct and a function call. Additionally, PHP optimizes the performance for *constant arrays* at compile time.

Unlike *argument unpacking*, you can use the *spread operator* anywhere. For example, you can use the *spread operator* at the beginning of the array:

```php
<?php

$numbers = [1,2];
$scores = [...$numbers, 3, 4];

print_r($scores);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
```

Or you can use the *spread operator* in the middle of an *array* like this:

```php
<?php

$numbers = [2,3];
$scores = [1, ...$numbers, 4];

print_r($scores);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-spread-operator/)

### Multiple expanding

It's possible to expand multiple times, and add normal elements before or after the *`...` operator*:

*Example: Simple array unpacking*

```php
<?php
// Using short array syntax.
// Also, works with array() syntax.
$arr1 = [1, 2, 3];
$arr2 = [...$arr1]; // [1, 2, 3]
$arr3 = [0, ...$arr1]; // [0, 1, 2, 3]
$arr4 = [...$arr1, ...$arr2, 111]; // [1, 2, 3, 1, 2, 3, 111]
$arr5 = [...$arr1, ...$arr1]; // [1, 2, 3, 1, 2, 3]

function getArr() {
  return ['a', 'b'];
}
$arr6 = [...getArr(), 'c' => 'd']; // ['a', 'b', 'c' => 'd']

var_dump($arr1, $arr2, $arr3, $arr4, $arr5, $arr6);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

PHP allows you to use the *spread operator* multiple times. For example:

```php
<?php

$even = [2, 4, 6];
$odd = [1, 2, 3];
$all = [...$odd, ...$even];

print_r($all);
```

Output:

```
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 2
    [4] => 4
    [5] => 6
)
```

How it works.

* First, define two *arrays* `$even` and `$odd` that hold the even and odd numbers.
* Second, use the *spread operator* to spread *elements* of these *arrays* into a new *array* `$all`. The `$all` *array* will hold the *elements* of both *arrays*, `$even` and `$odd`.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-spread-operator/#using-the-spread-operator-multiple-times)

*Example: Array unpacking*

```php
<?php

$numbers = [2, 3, 4];
$values = [5.1, 6.3, 7.5];
$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];


$quantities = [0, 1, ...$numbers];

print("Quantities:\n\n");
var_dump($quantities);
print(PHP_EOL);

$measures = [...$numbers, ...$values];

print("Measures:\n\n");
var_dump($measures);
print(PHP_EOL);

$varietes = [0, ...$measures, ...$items, ...['exit', 'quit']];

print("Varietes:\n\n");
var_dump($varietes);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Quantities:

Array
(
    [0] => 0
    [1] => 1
    [2] => 2
    [3] => 3
    [4] => 4
)

Measures:

Array
(
    [0] => 2
    [1] => 3
    [2] => 4
    [3] => 5.1
    [4] => 6.3
    [5] => 7.5
)

Varietes:

Array
(
    [0] => 0
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5.1
    [5] => 6.3
    [6] => 7.5
    [greetings] => Hello, there!
    [color] => orange
    [number] => 3.14
    [7] => exit
    [8] => quit
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_unpacking.php)

### Keys overwtiting

*Unpacking an array* with the *`...` operator* follows the semantics of the `array_merge()` function. That is, later *string keys* overwrite earlier ones and *integer keys* are renumbered:

*Example: Array unpacking with duplicate key*

```php
<?php
// string key
$arr1 = ["a" => 1];
$arr2 = ["a" => 2];
$arr3 = ["a" => 0, ...$arr1, ...$arr2];
var_dump($arr3); // ["a" => 2]

// integer key
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6); // [1, 2, 3, 4, 5, 6]
// Which is [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 6]
// where the original integer keys have not been retained.
?>
```

Note:

*Keys* that are neither *integers* nor *strings* throw a `TypeError`. Such *keys* can only be generated by a `Traversable` object.

Note:

Prior to PHP 8.1, unpacking an *array* which has a *string key* is not supported:

```php
<?php

$arr1 = [1, 2, 3];
$arr2 = ['a' => 4];
$arr3 = [...$arr1, ...$arr2];
// Fatal error: Uncaught Error: Cannot unpack array with string keys in example.php:5

$arr4 = [1, 2, 3];
$arr5 = [4, 5];
$arr6 = [...$arr4, ...$arr5]; // works. [1, 2, 3, 4, 5]
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

*Example: Array unpacking and key overwriting*

```php
<?php

$someNumbers = [1, 3, 5];
$otherNumbers = [7, 8, 9];
$anotherNumbers = [0 => 2, 1 => 4, 2 => 6];
$someValues = [0 => 7.1, 1 => 8.2, 2 => 9.3];
$otherValues = [10 => 1.2, 11 => 2.4, 12 => 3.6];

$someQuantities = [...$someNumbers, ...$otherNumbers];

print("Some quantities:\n\n");
print_r($someQuantities);
print(PHP_EOL);

$otherQuantities = [...$someNumbers, ...$anotherNumbers];

print("Other quantities:\n\n");
print_r($otherQuantities);
print(PHP_EOL);

$anotherQuantities = [...$anotherNumbers, ...$someNumbers];

print("Another quantities:\n\n");
print_r($anotherQuantities);
print(PHP_EOL);

$someMeasures = [...$someValues, ...$anotherNumbers];

print("Some measures:\n\n");
print_r($someMeasures);
print(PHP_EOL);

$otherMeasures = [...$someValues, ...$otherValues];

print("Other measures:\n\n");
print_r($otherMeasures);
print(PHP_EOL);

$someItems = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3,
];

$otherItems = [
    'color' => 'blue',
    'number' => 9,
];

$someVarietes = [...$someItems, ...$otherItems];

print("Some varietes:\n\n");
print_r($someVarietes);
print(PHP_EOL);

$otherVarietes = [...$otherItems, ...$someItems];

print("Other varietes:\n\n");
print_r($otherVarietes);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some quantities:

Array
(
    [0] => 1
    [1] => 3
    [2] => 5
    [3] => 7
    [4] => 8
    [5] => 9
)

Other quantities:

Array
(
    [0] => 1
    [1] => 3
    [2] => 5
    [3] => 2
    [4] => 4
    [5] => 6
)

Another quantities:

Array
(
    [0] => 2
    [1] => 4
    [2] => 6
    [3] => 1
    [4] => 3
    [5] => 5
)

Some measures:

Array
(
    [0] => 7.1
    [1] => 8.2
    [2] => 9.3
    [3] => 2
    [4] => 4
    [5] => 6
)

Other measures:

Array
(
    [0] => 7.1
    [1] => 8.2
    [2] => 9.3
    [3] => 1.2
    [4] => 2.4
    [5] => 3.6
)

Some varietes:

Array
(
    [greetings] => Hello, there!
    [color] => blue
    [number] => 9
)

Other varietes:

Array
(
    [color] => orange
    [number] => 3
    [greetings] => Hello, there!
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_unpacking_ans_key_overwriting.php)

### Unpacking the result of the function call

The following example uses the *spread operator* with a return value of a function:

```php
<?php

function get_random_numbers()
{
    for ($i = 0; $i < 5; $i++) {
        $random_numbers[] = rand(1, 100);
    }
    return $random_numbers;
}

$random_numbers = [...get_random_numbers()];

print_r($random_numbers);
```

Output:

```
Array
(
    [0] => 47
    [1] => 78
    [2] => 83
    [3] => 13
    [4] => 32
)
```

How it works.

* First, define a *function* `get_random_numbers()` that returns an *array* of five random *integers* between `1` and `100`.
* Then, use the *spread operator* to spread out the *elements* of the returned *array* directly from the *function call*.

Note that you’ll likely see a different output because of the `rand()` function.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-spread-operator/#using-spread-operator-with-a-return-value-of-a-function-call)

### Unpacking the result of the generator call

In the following example, first, we define a *generator* that returns even numbers between `2` and `10`. Then, we use the *spread operator* to spread out the returned *value* of the *generator* into an *array*:

```php
<?php

function even_number()
{
    for($i =2; $i < 10; $i+=2){
        yield $i;
    }
}

$even = [...even_number()];

print_r($even);
```

Output:

```
Array
(
    [0] => 2
    [1] => 4
    [2] => 6
    [3] => 8
)
```

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-spread-operator/#using-spread-operator-with-a-generator)

### Unpacking the array as the function naming arguments

PHP 8 allows you to call a *function* using *named arguments*. For example:

```php
<?php

function format_name(string $first, string $middle, string $last): string
{
    return $middle ?
        "$first $middle $last" :
        "$first $last";
}

echo format_name(
    first: 'John',
    middle: 'V.',
    last: 'Doe'
); // John V. Doe
```

Also, you can pass the arguments to the `format_name` *function* using the *spread operator*:

```php
<?php

function format_name(string $first, string $middle, string $last): string
{
    return $middle ?
        "$first $middle $last" :
        "$first $last";
}


$names = [
    'first' => 'John',
    'middle' => 'V.',
    'last' => 'Doe'
];

echo format_name(...$names); // John V. Doe
```

In this case, the *keys* of the *array elements* correspond to the *parameter names* of the `format_name()` *function*.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-spread-operator/#spread-operator-and-named-arguments)

## Comparing

It is possible to compare arrays with the `array_diff()` function and with array operators.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

## Useful functions

There are quite a few useful functions for working with arrays. See the array functions section.

Note:

The `unset()` function allows removing *keys* from an *array*. Be aware that the *array* will not be *reindexed*. If a true "remove and shift" behavior is desired, the array can be *reindexed* using the `array_values()` function.

*Example: Unsetting intermediate elements*

```php
<?php
$a = array(1 => 'one', 2 => 'two', 3 => 'three');

/* will produce an array that would have been defined as
   $a = array(1 => 'one', 3 => 'three');
   and NOT
   $a = array(1 => 'one', 2 =>'three');
*/
unset($a[2]);
var_dump($a);

$b = array_values($a);
// Now $b is array(0 => 'one', 1 =>'three')
var_dump($b);
?>
```

The `foreach` control structure exists specifically for *arrays*. It provides an easy way to traverse an *array*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

## Array do's and don'ts

### Why is `$foo[bar]` wrong?

Always use quotes around a *string literal array index*. For example, `$foo['bar']` is correct, while `$foo[bar]` is not. But why? It is common to encounter this kind of syntax in old scripts:

```php
<?php
$foo[bar] = 'enemy';
echo $foo[bar];
// etc
?>
```

This is wrong, but it works. The reason is that this code has an *undefined constant* (`bar`) rather than a string (`'bar'` - notice the quotes). It works because PHP automatically converts a *bare string* (an unquoted string which does not correspond to any known symbol) into a *string* which contains the *bare string*. For instance, if there is no defined *constant* named `bar`, then PHP will substitute in the *string* `'bar'` and use that.

Warning

The fallback to treat an *undefined constant* as *bare string* issues an error of level `E_NOTICE`. This has been deprecated as of PHP 7.2.0, and issues an error of level `E_WARNING`. As of PHP 8.0.0, it has been removed and throws an `Error` exception.

This does not mean to always quote the *key*. Do not quote keys which are constants or variables, as this will prevent PHP from interpreting them.

*Example: Key quoting*

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

// Simple array:
$array = array(1, 2);
$count = count($array);

for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array['$i'] . "\n";
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array['$i']}\n";
    echo "Good: {$array[$i]}\n";
}
?>
```

The above example will output:

```
Checking 0:
Notice: Undefined index:  $i in /path/to/script.html on line 9
Bad:
Good: 1
Notice: Undefined index:  $i in /path/to/script.html on line 11
Bad:
Good: 1

Checking 1:
Notice: Undefined index:  $i in /path/to/script.html on line 9
Bad:
Good: 2
Notice: Undefined index:  $i in /path/to/script.html on line 11
Bad:
Good: 2
```

More examples to demonstrate this behaviour:

*Example: More examples*

```php
<?php
// Show all errors
error_reporting(E_ALL);

$arr = array('fruit' => 'apple', 'veggie' => 'carrot');

// Correct
echo $arr['fruit'], PHP_EOL;  // apple
echo $arr['veggie'], PHP_EOL; // carrot

// Incorrect. This does not work and throws a PHP Error because
// of an undefined constant named fruit
//
// Error: Undefined constant "fruit"
try {
    echo $arr[fruit];
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}

// This defines a constant to demonstrate what's going on.  The value 'veggie'
// is assigned to a constant named fruit.
define('fruit', 'veggie');

// Notice the difference now
echo $arr['fruit'], PHP_EOL;  // apple
echo $arr[fruit], PHP_EOL;    // carrot

// The following is okay, as it's inside a string. Constants are not looked for
// within strings, so no error occurs here
echo "Hello $arr[fruit]", PHP_EOL;      // Hello apple

// With one exception: braces surrounding arrays within strings allows constants
// to be interpreted
echo "Hello {$arr[fruit]}", PHP_EOL;    // Hello carrot
echo "Hello {$arr['fruit']}", PHP_EOL;  // Hello apple

// Concatenation is another option
echo "Hello " . $arr['fruit'], PHP_EOL; // Hello apple
?>
```

```php
<?php
// This will not work, and will result in a parse error, such as:
// Parse error: parse error, expecting T_STRING' or T_VARIABLE' or T_NUM_STRING'
// This of course applies to using superglobals in strings as well
print "Hello $arr['fruit']";
print "Hello $_GET['foo']";
?>
```

As stated in the syntax section, what's inside the square brackets (`[` and `]`) must be an *expression*. This means that code like this works:

```php
<?php
echo $arr[somefunc($bar)];
?>
```

This is an example of using a function return value as the *array index*. PHP also knows about constants:

```php
<?php
$error_descriptions[E_ERROR]   = "A fatal error has occurred";
$error_descriptions[E_WARNING] = "PHP issued a warning";
$error_descriptions[E_NOTICE]  = "This is just an informal notice";
?>
```

Note that `E_ERROR` is also a valid identifier, just like `bar` in the first example. But the last example is in fact the same as writing:

```php
<?php
$error_descriptions[1] = "A fatal error has occurred";
$error_descriptions[2] = "PHP issued a warning";
$error_descriptions[8] = "This is just an informal notice";
?>
```

because `E_ERROR` equals `1`, etc.

So why is it bad then?

At some point in the future, the PHP team might want to add another *constant* or *keyword*, or a *constant* in other code may interfere. For example, it is already wrong to use the words `empty` and `default` this way, since they are *reserved keywords*.

Note: To reiterate, inside a double-quoted string, it's valid to not surround *array indexes* with quotes so `$foo[bar]` is valid.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

## Converting to array

For any of the types `int`, `float`, `string`, `bool` and `resource`, *converting* a *value* to an *array* results in an *array* with a single element with *index zero* and the value of the *scalar* which was converted. In other words, `(array) $scalarValue` is exactly the same as `array($scalarValue)`.

If an *object* is converted to an *array*, the result is an *array* whose *elements* are the object's *properties*. The *keys* are the *member variable* names, with a few notable exceptions: *integer* properties are *unaccessible*; *private variables* have the *class* name prepended to the *variable* name; *protected variables* have a `*` prepended to the *variable* name. These prepended values have *NUL bytes* on either side. Uninitialized typed properties are silently discarded.

*Example: Converting to an array*

```php
<?php

class A {
    private $B;
    protected $C;
    public $D;
    function __construct()
    {
        $this->{1} = null;
    }
}

var_export((array) new A());
?>
```

The above example will output:

```
array (
  '' . "\0" . 'A' . "\0" . 'B' => NULL,
  '' . "\0" . '*' . "\0" . 'C' => NULL,
  'D' => NULL,
  1 => NULL,
)
```

[ This is how to get such item:

```php
<?php

class A {
    private $B = 'a';
    protected $C = 'b';
    public $D = 'c';
    function __construct()
    {
        // $this->{1} = null;
    }
}

// var_export((array) new A());
$a = (array) new A();
// var_dump($a);
$index = '' . "\0" . 'A' . "\0" . 'B';
var_dump($a[$index]);
```

Result:

```
string(1) "a"
```

-- KK]

These NUL can result in some unexpected behaviour:

*Example: Casting an object to an array*

```php
<?php

class A {
    private $A; // This will become '\0A\0A'
}

class B extends A {
    private $A; // This will become '\0B\0A'
    public $AA; // This will become 'AA'
}

var_dump((array) new B());
?>
```

The above example will output:

```
array(3) {
  ["BA"]=>
  NULL
  ["AA"]=>
  NULL
  ["AA"]=>
  NULL
}
```

The above will appear to have two keys named `AA`, although one of them is actually named `\0A\0A`.

Converting `null` to an array results in an *empty array*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

## Examples

The `array` type in PHP is very *versatile*. Here are some examples:

*Example: Array versatility*

```php
<?php
// This:
$a = array( 'color' => 'red',
            'taste' => 'sweet',
            'shape' => 'round',
            'name'  => 'apple',
            4        // key will be 0
          );

$b = array('a', 'b', 'c');

var_dump($a, $b);

// . . .is completely equivalent with this:
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[]        = 4;        // key will be 0

$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';

// After the above code is executed, $a will be the array
// array('color' => 'red', 'taste' => 'sweet', 'shape' => 'round',
// 'name' => 'apple', 0 => 4), and $b will be the array
// array(0 => 'a', 1 => 'b', 2 => 'c'), or simply array('a', 'b', 'c').

var_dump($a, $b);
?>
```

*Example: Using `array()`*

```php
<?php
// Array as (property-)map
$map = array( 'version'    => 4,
              'OS'         => 'Linux',
              'lang'       => 'english',
              'short_tags' => true
            );
var_dump($map);

// strictly numerical keys
// this is the same as array(0 => 7, 1 => 8, ...)
$array = array( 7,
                8,
                0,
                156,
                -10
              );
var_dump($array);

$switching = array(         10, // key = 0
                    5    =>  6,
                    3    =>  7,
                    'a'  =>  4,
                            11, // key = 6 (maximum of integer-indices was 5)
                    '8'  =>  2, // key = 8 (integer!)
                    '02' => 77, // key = '02'
                    0    => 12  // the value 10 will be overwritten by 12
                  );
var_dump($switching);

// empty array
$empty = array();
var_dump($empty);
?>
```

*Example: Collection*

```php
<?php
$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as $color) {
    echo "Do you like $color?\n";
}

?>
```

The above example will output:

```
Do you like red?
Do you like blue?
Do you like green?
Do you like yellow?
```

Changing the *values* of the *array* directly is possible by passing them by *reference*.

*Example: Changing element in the loop*

```php
<?php
$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as &$color) {
    $color = mb_strtoupper($color);
}
unset($color); /* ensure that following writes to
$color will not modify the last array element */

print_r($colors);
?>
```

The above example will output:

```
Array
(
    [0] => RED
    [1] => BLUE
    [2] => GREEN
    [3] => YELLOW
)
```

This example creates a one-based *array*.

*Example: One-based index*

```php
<?php
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);
?>
```

The above example will output:

```
Array
(
    [1] => January
    [2] => February
    [3] => March
)
```

*Example: Filling an array*

```php
<?php
// fill an array with all items from a directory
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle);

var_dump($files);
?>
```

*Arrays* are ordered. The order can be changed using various sorting functions. The `count()` function can be used to count the number of *items* in an *array*.

*Example: Sorting an array*

```php
<?php
sort($files);
print_r($files);
?>
```

Because the *value* of an *array* can be anything, it can also be another *array*. This enables the creation of recursive and multi-dimensional arrays.

*Example: Recursive and multi-dimensional arrays*

```php
<?php
$fruits = array ( "fruits"  => array ( "a" => "orange",
                                       "b" => "banana",
                                       "c" => "apple"
                                     ),
                  "numbers" => array ( 1,
                                       2,
                                       3,
                                       4,
                                       5,
                                       6
                                     ),
                  "holes"   => array (      "first",
                                       5 => "second",
                                            "third"
                                     )
                );
var_dump($fruits);

// Some examples to address values in the array above
echo $fruits["holes"][5];    // prints "second"
echo $fruits["fruits"]["a"]; // prints "orange"
unset($fruits["holes"][0]);  // remove "first"

// Create a new multi-dimensional array
$juices["apple"]["green"] = "good";
var_dump($juices);
?>
```

*Array assignment* always involves *value copying*. Use the reference operator to copy an array by reference.

*Example: Array copying*

```php
<?php
$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4; // $arr2 is changed,
             // $arr1 is still array(2, 3)

$arr3 = &$arr1;
$arr3[] = 4; // now $arr1 and $arr3 are the same

var_dump($arr1, $arr2, $arr3);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.array.php)

[▵ Up](#arrays)
[⌂ Home](../../../../../README.md)
[▲ Previous: Strings](../../scalar/strings/strings.md)
[▼ Next: Objects](../objects/objects.md)
