[⌂ Home](../../../../../README.md)
[▲ Previous: Strings](../../scalar/strings/strings.md)
[▼ Next: Objects](../objects/objects.md)

# Arrays

An **array** in PHP is actually an *ordered map*. A *map* is a type that associates *values* to *keys*. This type is optimized for several different uses; it can be treated as an *array*, *list* (*vector*), *hash table* (an implementation of a *map*), *dictionary*, *collection*, *stack*, *queue*, and probably more. As *array* values can be other *arrays*, *trees* and *multidimensional arrays* are also possible.

## Syntax

### Specifying with `array()`

An `array` can be created using the `array()` language construct. It takes any number of comma-separated `key => value` pairs as arguments.

```php
array(
    key  => value,
    key2 => value2,
    key3 => value3,
    ...
)
```

The comma after the last array element is optional and can be omitted. This is usually done for single-line arrays, i.e. `array(1, 2)` is preferred over `array(1, 2, )`. For multi-line arrays on the other hand the trailing comma is commonly used, as it allows easier addition of new elements at the end.

Note:

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

The key can either be an `int` or a `string`. The value can be of any type.

Additionally the following *key casts* will occur:

* *Strings* containing valid decimal *ints*, unless the number is preceded by a `+` sign, will be cast to the `int` type. E.g. the key `"8"` will actually be stored under `8`. On the other hand `"08"` will not be cast, as it isn't a valid decimal integer.
* *Floats* are also cast to *ints*, which means that the fractional part will be truncated. E.g. the key `8.7` will actually be stored under `8`.
* *Bools* are cast to *ints*, too, i.e. the key `true` will actually be stored under `1` and the key `false` under `0`.
* *Null* will be cast to the *empty string*, i.e. the key `null` will actually be stored under `""`.
* *Arrays* and objects can not be used as keys. Doing so will result in a warning: `Illegal offset type`.

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

```php
array(1) {
  [1]=>
  string(1) "d"
}
```

As all the keys in the above example are cast to `1`, the value will be overwritten on every new element and the last assigned value `"d"` is the only one left over.

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
￼Run code
The above example will output:

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

It is possible to specify the key only for some elements and leave it out for others:

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

This example includes all variations of type casting of keys and overwriting of elements.

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

### Accessing array elements with square bracket syntax

*Array elements* can be accessed using the array[key] syntax.

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

*Array dereferencing* a scalar value which is not a string yields null. Prior to PHP 7.4.0, that did not issue an error message. As of PHP 7.4.0, this issues `E_NOTICE`; as of PHP 8.0.0, this issues `E_WARNING`.

### Creating/modifying with square bracket syntax

An existing *array* can be modified by explicitly setting values in it.

This is done by assigning *values* to the *array*, specifying the *key* in brackets. The *key* can also be omitted, resulting in an empty pair of brackets (`[]`).

```php
$arr[key] = value;
$arr[] = value;
// key may be an int or string
// value may be any value of any type
```

If `$arr` doesn't exist yet or is set to `null` or `false`, it will be created, so this is also an alternative way to create an *array*. This practice is however discouraged because if `$arr` already contains some value (e.g. string from request variable) then this value will stay in the place and `[]` may actually stand for *string access operator*. It is always better to initialize a variable by a direct assignment.

Note: As of PHP 7.1.0, applying the empty index operator on a *string* throws a fatal error. Formerly, the *string* was silently converted to an *array*.

Note: As of PHP 8.1.0, creating a new *array* from `false` value is deprecated. Creating a new *array* from `null` and undefined values is still allowed.

To change a certain *value*, assign a new *value* to that *element* using its *key*. To remove a *key*/*value* pair, call the `unset()` function on it.

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

Note:

As mentioned above, if no *key* is specified, the maximum of the existing `int` indices is taken, and the new *key* will be that maximum value plus `1` (but at least `0`). If no `int` indices exist yet, the *key* will be `0` (zero).

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

### Array destructuring

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

## Comparing

It is possible to compare arrays with the `array_diff()` function and with array operators.

## Array unpacking

An *array* prefixed by `...` will be *expanded* in place during *array definition*. Only *arrays* and *objects* which implement `Traversable` can be *expanded*. *Array unpacking* with `...` is available as of PHP 7.4.0. This is also called the ***spread operator***.

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

Unpacking an array with the *`...` operator* follows the semantics of the `array_merge()` function. That is, later *string keys* overwrite earlier ones and *integer keys* are renumbered:

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

## Examples

*Example: Array basic usage*

```php
<?php

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("Not initialised, after some assignments:\n\n");
print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");
var_dump($numbers); print("\n");

$values = [9.5, 8.5, 7.5];

print("Initialised (by []):\n\n");
print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");
var_dump($values); print("\n");

$amounts = array(3, 6, 9);

print("Initialised (by array()):\n\n");
print("\$amounts[0]: {$amounts[0]}\n");
print("\$amounts[1]: {$amounts[1]}\n");
print("\$amounts[2]: {$amounts[2]}\n\n");
var_dump($amounts); print("\n");

$items = [2, "orange"];
$items[0] = 2.5;
$items[4] = 321;

print("Initialised, after some overwritting and appendings:\n\n");
print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n"); // Warning:  Undefined array key 2
print("\$items[3]: {$items[3]}\n"); // Warning:  Undefined array key 3
print("\$items[4]: {$items[4]}\n");
print("\$items[5]: {$items[5]}\n\n"); // Warning:  Undefined array key 5
var_dump($items); print("\n");

$things = [
  1,
  2,
  3 => 4,
  5
];

print("Initialised with indexes:\n\n");
print("\$things[0]: {$things[0]}\n");
print("\$things[1]: {$things[1]}\n");
print("\$things[2]: {$things[2]}\n"); // Warning:  Undefined array key 2
print("\$things[3]: {$things[3]}\n");
print("\$things[4]: {$things[4]}\n\n");
var_dump($things); print("\n");

$words = array(
  2 => "last",
  0 => "first",
  1 => "two",
);

print("Initialised with unordered indexes:\n\n");
print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");
var_dump($words); print("\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Not initialised, after some assignments:

$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}

Initialised (by []):

$values[0]: 9.5
$values[1]: 8.5
$values[2]: 7.5

array(3) {
  [0]=>
  float(9.5)
  [1]=>
  float(8.5)
  [2]=>
  float(7.5)
}

Initialised (by array()):

$amounts[0]: 3
$amounts[1]: 6
$amounts[2]: 9

array(3) {
  [0]=>
  int(3)
  [1]=>
  int(6)
  [2]=>
  int(9)
}

Initialised, after some overwritting and appendings:

$items[0]: 2.5
$items[1]: orange
PHP Warning:  Undefined array key 2 in /media/storage/repository/php/php.lab/example/code/arrays/array.php on line 36
$items[2]:
PHP Warning:  Undefined array key 3 in /media/storage/repository/php/php.lab/example/code/arrays/array.php on line 37
$items[3]:
$items[4]: 321
PHP Warning:  Undefined array key 5 in /media/storage/repository/php/php.lab/example/code/arrays/array.php on line 39
$items[5]:

array(3) {
  [0]=>
  float(2.5)
  [1]=>
  string(6) "orange"
  [4]=>
  int(321)
}

Initialised with indexes:

$things[0]: 1
$things[1]: 2
PHP Warning:  Undefined array key 2 in /media/storage/repository/php/php.lab/example/code/arrays/array.php on line 52
$things[2]:
$things[3]: 4
$things[4]: 5

array(4) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [3]=>
  int(4)
  [4]=>
  int(5)
}

Initialised with unordered indexes:

$words[0]: first
$words[1]: two
$words[2]: last

array(3) {
  [2]=>
  string(4) "last"
  [0]=>
  string(5) "first"
  [1]=>
  string(3) "two"
}

```

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

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_definition_and_initialisation.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

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

*Example: Array assignment and overwriting*

```php
<?php

$array = [];

print("Not initialised, before assignments: \$array = []\n\n");
print_r($array); print("\n");

$array = [0, 0, 0];

print("Initialised, before assignments: \$array = [0, 0, 0]\n\n");
print_r($array); print("\n");

$array[1] = 6;

print("After assignment: \$array[1] = 6\n\n");
print_r($array); print("\n");

$array[1] = 10;

print("After overwriting: \$array[1] = 10\n\n");
print_r($array); print("\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_assignment_and_overwriting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

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

After assignment: $array[1] = 6

Array
(
    [0] => 0
    [1] => 6
    [2] => 0
)

After overwriting: $array[1] = 10

Array
(
    [0] => 0
    [1] => 10
    [2] => 0
)

```

*Example: Array elements access*

```php
<?php

$numbers = [];

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

print("\$numbers[0]: " . current($numbers) . "\n");
print("\$numbers[1]: " . next($numbers) . "\n");
print("\$numbers[2]: " . next($numbers) . "\n\n");

print("\$numbers[2]: " . current($numbers) . "\n");
print("\$numbers[1]: " . prev($numbers) . "\n");
print("\$numbers[0]: " . prev($numbers) . "\n\n");

$values = &$numbers;

$values[0] = 3;
$values[1] = 6;
$values[2] = 9;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$items = [];

$items[2] = "Hello, there!";
$items['color'] = 'orange';
$items[3.14] = 'PI';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n");
print("\$items[3.14]: {$items[3.14]}\n\n");

print("\$items[0]: " . current($items) . "\n");
print("\$items[1]: " . next($items) . "\n");
print("\$items[2]: " . next($items) . "\n\n");

print("\$items[2]: " . current($items) . "\n");
print("\$items[1]: " . prev($items) . "\n");
print("\$items[0]: " . prev($items) . "\n\n");

$things = &$items;

$things[2] = "Hi!";
$things['color'] = 'blue';
$things[3.14] = 'three point fourteen';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n");
print("\$items[3.14]: {$items[3.14]}\n\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_elements_access.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

$numbers[2]: 6
$numbers[1]: 4
$numbers[0]: 2

$numbers[0]: 3
$numbers[1]: 6
$numbers[2]: 9

$items[2]: Hello, there!
$items['color']: orange
$items[3.14]: PI

$items[0]: Hello, there!
$items[1]: orange
$items[2]: PI

$items[2]: PI
$items[1]: orange
$items[0]: Hello, there!

$items[2]: Hi!
$items['color']: blue
$items[3.14]: three point fourteen

```

*Example: Array size*

```php
<?php

$numbers = [9, 7, 5];
$values = [9.5, 8.5, 7.5, 3.3, 2.0];

// sizeof is an alias of count

$size = sizeof($numbers);
$count = count($numbers);
print("Length of numbers: {$size} (the same: {$count})\n");

$size = sizeof($values);
$count = count($values);
print("Length of values: {$size} (the same: {$count})\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_size.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Length of numbers: 3 (the same: 3)
Length of values: 5 (the same: 5)
```

*Example: Associative arrays*

```php
<?php

$numbers = [9, 7, 5];
$values = [9.5, 8.5, 7.5, 3.3, 2.0];

// sizeof is an alias of count

$size = sizeof($numbers);
$count = count($numbers);
print("Length of numbers: {$size} (the same: {$count})\n");

$size = sizeof($values);
$count = count($values);
print("Length of values: {$size} (the same: {$count})\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_size.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$items[2]: Hello, there!
$items['color']: orange
$items[3.14]: PI

array(3) {
  [2]=>
  string(13) "Hello, there!"
  ["color"]=>
  string(6) "orange"
  [3]=>
  string(2) "PI"
}
```

*Example: Nested arrays*

```php
<?php

$values = [1, 3, 5, [2, 4, 6], 'seven'];

var_dump($values);
print("\n");

$second_even_value = $values[3][1];

print("Second even value: $second_even_value\n\n");

$data = [
  'name' => 'amelie',
  'address' => [
    'city' => 'Twin Peaks',
    'street' => 'Hundret Acre Wood',
    'house' => [
      'no' => 6,
      'flat_no' => 127
    ],
  ],
  'species' => 'owl',
];

var_dump($data);
print("\n");

$flat_no = $data['address']['house']['flat_no'];

print("Flat number: $flat_no\n\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/nested_arrays_php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
array(5) {
  [0]=>
  int(1)
  [1]=>
  int(3)
  [2]=>
  int(5)
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
  string(5) "seven"
}

Second even value: 4

array(3) {
  ["name"]=>
  string(6) "amelie"
  ["address"]=>
  array(3) {
    ["city"]=>
    string(10) "Twin Peaks"
    ["street"]=>
    string(17) "Hundret Acre Wood"
    ["house"]=>
    array(2) {
      ["no"]=>
      int(6)
      ["flat_no"]=>
      int(127)
    }
  }
  ["species"]=>
  string(3) "owl"
}

Flat number: 127

```

*Example: Array element examples*

```php
<?php

$numbers = [2, 4, 6];

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");
var_dump($numbers); print("\n\n");

$values = [9.5, 8.5, 7.5];

print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");
var_dump($values); print("\n\n");

$words = ["first", "two", "last"];

print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");
var_dump($words); print("\n\n");

$items = [
  321,
  2.5,
  "orange",
  [2, 4, 6],
  new stdClass,
];

print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n");
print("\$items[3]: {$items[3][0]}, {$items[3][1]}, {$items[3][2]}\n");
print("\$items[4]: " . gettype($items[4]) . "\n\n");
var_dump($items); print("\n\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_element_examples.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$numbers[0]: 2
$numbers[1]: 4
$numbers[2]: 6

array(3) {
  [0]=>
  int(2)
  [1]=>
  int(4)
  [2]=>
  int(6)
}


$values[0]: 9.5
$values[1]: 8.5
$values[2]: 7.5

array(3) {
  [0]=>
  float(9.5)
  [1]=>
  float(8.5)
  [2]=>
  float(7.5)
}


$words[0]: first
$words[1]: two
$words[2]: last

array(3) {
  [0]=>
  string(5) "first"
  [1]=>
  string(3) "two"
  [2]=>
  string(4) "last"
}


$items[0]: 321
$items[1]: 2.5
$items[2]: orange
$items[3]: 2, 4, 6
$items[4]: object

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


```

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
?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_key_type_casting_and_overwriting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

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

*Example: Array dereferencing*

```php
<?php

$numbers = [2, 4, 6];

$second_element = $numbers[1];

print("Second number: $second_element\n\n");

list($e1, $e2, $e3) = $numbers;

print("First number: $e1\n");
print("Second number: $e2\n");
print("Third number: $e3\n\n");

list(,,$element_3) = $numbers;

print("Third number: $element_3\n\n");

list(1 => $element_2, 0 => $element_1) = $numbers;

print("First number: $element_1\n");
print("Second number: $element_2\n\n");

$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];

list('greetings' => $item_1, 'number' => $item_2, 'color' => $item_3) = $items;

print("First item: $item_1\n");
print("Second item: $item_2\n");
print("Third item: $item_3\n\n");

function get_numbers() {
  return array(2, 4, 6);
}

$first_element = get_numbers()[0];

print("First number: $first_element\n\n");

list($elem_1) = get_numbers();

print("First number: $elem_1\n\n");

list(, $elem_2) = get_numbers();

print("Second number: $elem_2\n\n");

$values = [1, 3, 5, [7.1, 7.3, 7.5]];

list($el_1, $el_2, $el_3, list($nel_1, $nel_2, $nel_3)) = $values;

print("First value: $el_1\n");
print("Second value: $el_2\n");
print("Third value: $el_3\n");
print("First nested value: $nel_1\n");
print("Second nested value: $nel_2\n");
print("Third nested value: $nel_3\n\n");

$properties = [
  'name' => 'Amelie',
  'address' => [
    'city' => 'Twin Peaks',
    'street' => 'Hundret Acre Wood',
    'house' => [
      'no' => 6,
      'flat_no' => 127
    ],
  ],
  'species' => 'owl',
];

extract($properties);

print("First property: $name\n");
print("Second property:\n");
print_r($address);
print("Third property: $species\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_dereferencing.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Second number: 4

First number: 2
Second number: 4
Third number: 6

Third number: 6

First number: 2
Second number: 4

First item: Hello, there!
Second item: 3.14
Third item: orange

First number: 2

First number: 2

Second number: 4

First value: 1
Second value: 3
Third value: 5
First nested value: 7.1
Second nested value: 7.3
Third nested value: 7.5

First property: Amelie
Second property:
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
Third property: owl
```

*Example: Array merging*

```php
<?php

$values = [9.5, 2.5, 7.5];
$items = [2.5, "orange"];

print("values:\n");
print_r($values);
print("items:\n");
print_r($items);
print("\n");

$elements = array_merge($values, $items);

print("\$elements = array_merge(\$values, \$items)\n");
print("elements:\n");
print_r($elements);
print("\n");

$elements = $items + $values;

print("\$elements = \$items + \$values\n");
print("elements:\n");
print_r($elements);
print("\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_merging.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
values:
Array
(
    [0] => 9.5
    [1] => 2.5
    [2] => 7.5
)
items:
Array
(
    [0] => 2.5
    [1] => orange
)

$elements = array_merge($values, $items)
elements:
Array
(
    [0] => 9.5
    [1] => 2.5
    [2] => 7.5
    [3] => 2.5
    [4] => orange
)

$elements = $items + $values
elements:
Array
(
    [0] => 2.5
    [1] => orange
    [2] => 7.5
)

```

*Example: Iterating over array and reading elements*

```php
<?php

$array = ['apple', 'orange', 'banana', 'pear', 'peach'];

for ($i = 0; $i < count($array); $i++) {
  print("\$array[{$i}]: {$array[$i]}\n");
}

print("\n");

$array = [2 => 'apple', 6 => 'orange', 15 => 'banana', 20 => 'pear', 35 => 'peach'];

foreach ($array as $value) {
  print("element: {$value}\n");
}

print("\n");

foreach ($array as $key => $value) {
  print("\$array[{$key}]: {$value} (the same: {$array[$key]})\n");
}

print("\n");

array_walk($array, function($value) {
  print("element: {$value}\n");
});

print("\n");

array_walk($array, function($value, $key) {
  print("\$array[{$key}]: {$value}\n");
});

print("\n");

$array = ['apple', 'orange', 'banana', 'pear', 'peach', 'nested' => ['cherry', 'strawberry', 'blueberry', 'raspberry', 'blackberry']];

array_walk_recursive($array, function($value) {
  print("element: {$value}\n");
});

print("\n");

array_walk_recursive($array, function($value, $key) {
  print("\$array[{$key}]: {$value}\n");
});

print("\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/iterating_over_array_and_reading_elements.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$array[0]: apple
$array[1]: orange
$array[2]: banana
$array[3]: pear
$array[4]: peach

element: apple
element: orange
element: banana
element: pear
element: peach

$array[2]: apple (the same: apple)
$array[6]: orange (the same: orange)
$array[15]: banana (the same: banana)
$array[20]: pear (the same: pear)
$array[35]: peach (the same: peach)

element: apple
element: orange
element: banana
element: pear
element: peach

$array[2]: apple
$array[6]: orange
$array[15]: banana
$array[20]: pear
$array[35]: peach

element: apple
element: orange
element: banana
element: pear
element: peach
element: cherry
element: strawberry
element: blueberry
element: raspberry
element: blackberry

$array[0]: apple
$array[1]: orange
$array[2]: banana
$array[3]: pear
$array[4]: peach
$array[0]: cherry
$array[1]: strawberry
$array[2]: blueberry
$array[3]: raspberry
$array[4]: blackberry

```

*Example: Iterating over array and updating elements*

```php
<?php

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

for ($i = 0; $i < count($array); $i++) {
  $array[$i] *= 2;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

foreach ($array as &$value) {
  $value *= 3;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

foreach ($array as $key => $value) {
  $array[$key] *= 3;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

array_walk($array, function(&$value) {
  $value *= 4;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

array_walk($array, function($value, $key) use (&$array) {
  $array[$key] *= 4;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5, 'nested' => [2, 4]];

print("Before:\n");
print_r($array);

array_walk_recursive($array, function(&$value) {
  $value *= 5;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5, 'nested' => [2, 4]];

print("Before:\n");
print_r($array);

array_walk_recursive($array, function($value, $key) use (&$array) {
  $array[$key] *= 5;
});

print("After:\n");
print_r($array);

print("\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/iterating_over_array_and_updating_elements.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)
After:
Array
(
    [0] => 2
    [1] => 6
    [2] => 10
)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)
After:
Array
(
    [0] => 3
    [1] => 9
    [2] => 15
)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)
After:
Array
(
    [0] => 3
    [1] => 9
    [2] => 15
)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)
After:
Array
(
    [0] => 4
    [1] => 12
    [2] => 20
)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)
After:
Array
(
    [0] => 4
    [1] => 12
    [2] => 20
)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
    [nested] => Array
        (
            [0] => 2
            [1] => 4
        )

)
After:
Array
(
    [0] => 5
    [1] => 15
    [2] => 25
    [nested] => Array
        (
            [0] => 10
            [1] => 20
        )

)

Before:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
    [nested] => Array
        (
            [0] => 2
            [1] => 4
        )

)
After:
Array
(
    [0] => 25
    [1] => 75
    [2] => 25
    [nested] => Array
        (
            [0] => 2
            [1] => 4
        )

)

```

*Example: Array internal pointer*

```php
<?php

$array = [1, 3, 5];

print("\$array:\n");
print_r($array);
print("\n");

$element = current($array);
print("current(\$array): $element(" . gettype($element) . ")\n");

$element = pos($array);
print("pos(\$array): $element(" . gettype($element) . ")\n");

$key = key($array);
print("key(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = next($array);
print("next(\$array): $element(" . gettype($element) . ")\n");

$element = current($array);
print("current(\$array): $element(" . gettype($element) . ")\n");

$element = pos($array);
print("pos(\$array): $element(" . gettype($element) . ")\n");

$key = key($array);
print("key(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = prev($array);
print("prev(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = next($array);
print("next(\$array): $element(" . gettype($element) . ")\n");

$element = next($array);
print("next(\$array): $element (" . gettype($element) . ")\n");

$element = current($array);
print("current(\$array): $element(" . gettype($element) . ")\n");

$key = key($array);
print("key(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = next($array);
print("next(\$array): $element (" . gettype($element) . ")\n");

$element = current($array);
print("current(\$array): $element(" . gettype($element) . ")\n");

$key = key($array);
print("key(\$array): $element(" . gettype($element) . ")\n");

$element = next($array);
print("next(\$array): $element (" . gettype($element) . ")\n");

$element = prev($array);
print("prev(\$array): $element(" . gettype($element) . ")\n");

$element = prev($array);
print("prev(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = end($array);
print("end(\$array): $element(" . gettype($element) . ")\n");

print("\n");

$element = reset($array);
print("reset(\$array): $element(" . gettype($element) . ")\n");

$element = next($array);
print("next(\$array): $element(" . gettype($element) . ")\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/array_internal_pointer.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$array:
Array
(
    [0] => 1
    [1] => 3
    [2] => 5
)

current($array): 1(integer)
pos($array): 1(integer)
key($array): 1(integer)

next($array): 3(integer)
current($array): 3(integer)
pos($array): 3(integer)
key($array): 3(integer)

prev($array): 1(integer)

next($array): 3(integer)
next($array): 5 (integer)
current($array): 5(integer)
key($array): 5(integer)

next($array):  (boolean)
current($array): (boolean)
key($array): (boolean)
next($array):  (boolean)
prev($array): (boolean)
prev($array): (boolean)

end($array): 5(integer)

reset($array): 1(integer)
next($array): 3(integer)
```

*Example: Passing array to the function*

```php
<?php

function function_receiving_array_by_value(array $argument): array
{
  print("Function receiving array by value\n");
  print("-- begin:\n");

  foreach ($argument as $key => $value) {
    print("before: argument[$key] = $value\n");
    print("argument[$key] = argument[$key] * 2\n");

    $argument[$key] = $argument[$key] * 2;

    print("after: argument[$key] = $argument[$key]\n");
  }

  print("-- end.\n");

  return $argument;
}

$values = [9, 8, 7];

print("BEFORE: \$values = [ ");
foreach ($values as $element)
  print($element . " ");
print("]\n");

$result_values = function_receiving_array_by_value($values);

print("AFTER: \$values = [ ");
foreach ($values as $element)
  print($element . " ");
print("]\n");
print("AFTER: \$result_values = [ ");
foreach ($result_values as $element)
  print($element . " ");
print("]\n");

?>
```

**View**:
[Example](../../../../../example/code/builtin_types/compound/arrays/passing_array_to_function.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
BEFORE: $values = [ 9 8 7 ]
Function receiving array by value
-- begin:
before: argument[0] = 9
argument[0] = argument[0] * 2
after: argument[0] = 18
before: argument[1] = 8
argument[1] = argument[1] * 2
after: argument[1] = 16
before: argument[2] = 7
argument[2] = argument[2] * 2
after: argument[2] = 14
-- end.
AFTER: $values = [ 9 8 7 ]
AFTER: $result_values = [ 18 16 14 ]
```

[▵ Up](#arrays)
[⌂ Home](../../../../../README.md)
[▲ Previous: Strings](../../scalar/strings/strings.md)
[▼ Next: Objects](../objects/objects.md)
