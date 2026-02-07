[⌂ Home](../../../README.md)
[▲ Previous: Variables](../literals_constants_variables/variables.md)
[▼ Next: Types](../types/types.md)

# References

## What references are

***References*** in PHP are a means to *access* the same *variable* *content* by different *names*. They are not like C *pointers*; for instance, you cannot perform *pointer arithmetic* using them, they are not actual *memory addresses*, and so on. Instead, they are *symbol table aliases*. Note that in PHP, *variable name* and *variable content* are different, so the same *content* can have different *names*. The closest analogy is with Unix filenames and files - variable names are directory entries, while *variable content* is the file itself. References can be likened to hardlinking in Unix filesystem.

-- [PHP Reference](https://www.php.net/manual/en/language.references.whatare.php)

## What references do

There are three basic operations performed using *references*: *assigning by reference*, *passing by reference*, and *returning by reference*. This section will give an introduction to these operations, with links for further reading.

### Assign by reference

In the first of these, PHP *references* allow you to make two *variables* refer to the same *content*. Meaning, when you do:

```php
<?php

$a =& $b;

?>
```

it means that `$a` and `$b` point to the same *content*.

Note:

`$a` and `$b` are completely equal here. `$a` is not pointing to `$b` or vice versa. `$a` and `$b` are pointing to the same place.

Note:

If you *assign*, *pass*, or *return* an *undefined variable* by *reference*, it will get created.

*Example: Using references with undefined variables*

```php
<?php

function foo(&$var) {}

foo($a); // $a is "created" and assigned to null

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b)); // bool(true)

$c = new stdClass();
foo($c->d);
var_dump(property_exists($c, 'd')); // bool(true)

?>
```

The same syntax can be used with *functions* that *return* *references*:

```php
<?php

$foo =& find_var($bar);

?>
```

Using the same syntax with a *function* that does not *return by reference* will give an error, as will using it with the result of the *`new` operator*. Although *objects* are passed around as *pointers*, these are not the same as *references*, as explained under *objects* and *references*.

Warning

If you assign a *reference* to a *variable* *declared* *global* inside a *function*, the *reference* will be visible only inside the *function*. You can avoid this by using the `$GLOBALS` *array*.

*Example: Referencing global variables inside functions*

```php
<?php

$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;

    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}

global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''

global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'

?>
```

Think about `global $var;` as a shortcut to `$var =& $GLOBALS['var'];`. Thus assigning another *reference* to `$var` only changes the *local variable's reference*.

Note:

If you *assign* a *value* to a *variable* with *references* in a *`foreach` statement*, the *references* are *modified* too.

*Example: References and `foreach` statement*

```php
<?php

$ref = 0;
$row =& $ref;

foreach (array(1, 2, 3) as $row) {
    // Do something
}

echo $ref; // 3 - last element of the iterated array

?>
```

While not being strictly an *assignment* by *reference*, *expressions* created with the language construct `array()` can also behave as such by prefixing `&` to the *array element* to add. Example:

```php
<?php

$a = 1;
$b = array(2, 3);

$arr = array(&$a, &$b[0], &$b[1]);
$arr[0]++;
$arr[1]++;
$arr[2]++;
/* $a == 2, $b == array(3, 4); */

?>
```

Note, however, that *references* inside *arrays* are potentially dangerous. Doing a normal (not by *reference*) *assignment* with a *reference* on the right side does not turn the left side into a *reference*, but *references* inside *arrays* are preserved in these normal *assignments*. This also applies to *function calls* where the *array* is passed by *value*. Example:

```php
<?php

/* Assignment of scalar variables */
$a = 1;
$b =& $a;
$c = $b;
$c = 7; // $c is not a reference; no change to $a or $b

/* Assignment of array variables */
$arr = array(1);
$a =& $arr[0]; // $a and $arr[0] are in the same reference set
$arr2 = $arr; // Not an assignment-by-reference!
$arr2[0]++;
/* $a == 2, $arr == array(2) */
/* The contents of $arr are changed even though it's not a reference! */

?>
```

In other words, the *reference* behavior of *arrays* is *defined* in an element-by-element basis; the *reference* behavior of individual *elements* is dissociated from the *reference* status of the *array* container.

### Pass by reference

The second thing *references* do is to *pass variables by reference*. This is done by making a *local variable* in a *function* and a *variable* in the *calling scope* referencing the same content. Example:

```php
<?php

function foo(&$var)
{
    $var++;
}

$a=5;
foo($a);

?>
```

will make `$a` to be `6`. This happens because in the *function* `foo` the *variable* `$var` refers to the same content as `$a`.

### Return by reference

The third thing *references* can do is *return by reference*.

-- [PHP Reference](https://www.php.net/manual/en/language.references.whatdo.php)

## What references are not

As said before, *references* are not *pointers*. That means, the following construct won't do what you expect:

```php
<?php

function foo(&$var)
{
    $var =& $GLOBALS["baz"];
}

foo($bar);

?>
```

What happens is that `$var` in `foo` will be bound with `$bar` in the caller, but then re-bound with `$GLOBALS["baz"]`. There's no way to *bind* `$bar` in the *calling scope* to something else using the *reference mechanism*, since `$bar` is not available in the *function* `foo` (it is represented by `$var`, but `$var` has only *variable contents* and not *name-to-value binding* in the *calling symbol table*). You can use *returning references* to *reference variables* selected by the *function*.

-- [PHP Reference](https://www.php.net/manual/en/language.references.arent.php)

## Passing by reference

You can *pass* a *variable* by *reference* to a *function* so the *function* can *modify* the *variable*. The syntax is as follows:

```php
<?php

function foo(&$var)
{
    $var++;
}

$a=5;

foo($a);
// $a is 6 here

?>
```

Note: There is no *reference sign* on a *function call* - only on *function definitions*. *Function definitions* alone are enough to correctly *pass* the *argument* by *reference*.

The following things can be *passed by reference*:

* *Variables*, i.e. `foo($a)`
* *References* returned from *functions*, i.e.:

```php
<?php

function foo(&$var)
{
    $var++;
}

function &bar()
{
    $a = 5;
    return $a;
}

foo(bar());

?>
```

No other *expressions* should be *passed by reference*, as the result is *undefined*. For example, the following examples of *passing by reference* are invalid:

```php
<?php

function foo(&$var)
{
    $var++;
}

function bar() // Note the missing &
{
    $a = 5;
    return $a;
}

foo(bar()); // Produces a notice

foo($a = 5); // Expression, not variable
foo(5); // Produces fatal error

class Foobar {}

foo(new Foobar()) // Produces a notice as of PHP 7.0.7
                  // Notice: Only variables should be passed by reference

?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.references.pass.php)

## Returning references

*Returning by reference* is useful when you want to use a *function* to find to which *variable* a *reference* should be bound. Do not use *return-by-reference* to increase performance. The engine will automatically optimize this on its own. Only *return references* when you have a valid technical reason to do so. To *return references*, use this syntax:

```php
<?php

class Foo
{
    public $value = 42;

    public function &getValue()
    {
        return $this->value;
    }
}

$obj = new Foo();
$myValue = &$obj->getValue(); // $myValue is a reference to $obj->value, which is 42
$obj->value = 2;
echo $myValue;                // Prints the new value of $obj->value, i.e. 2

?>
```

In this example, the *property* of the *object* returned by the `getValue` *function* would be set, not the copy, as it would be without using reference syntax.

Note: Unlike *parameter passing*, here you have to use `&` in both places - to indicate that you want to *return by reference*, not a *copy*, and to indicate that *reference binding*, rather than usual *assignment*, should be done for `$myValue`.

Note: If you try to *return a reference* from a *function* with the syntax: `return ($this->value);` this will not work as you are attempting to *return* the result of an *expression*, and not a *variable*, by *reference*. You can only *return* *variables* by *reference* from a *function* - nothing else.

To use the *returned reference*, you must use *reference assignment*:

```php
<?php

function &collector()
{
    static $collection = array();
    return $collection;
}

$collection = &collector();
// Now the $collection is a referenced variable that references the static array inside the function

$collection[] = 'foo';

print_r(collector());
// Array
// (
//    [0] => foo
// )

?>
```

Note: If the *assignment* is done without the `&` symbol, e.g. `$collection = collector();`, the `$collection` *variable* will receive a *copy* of the *value*, not the *reference* *returned* by the *function*.

To pass the *returned* *reference* to another *function* expecting a *reference* you can use this syntax:

```php
<?php

function &collector()
{
    static $collection = array();
    return $collection;
}

array_push(collector(), 'foo');

?>
```

Note: Note that `array_push(&collector(), 'foo');` will not work, it results in a fatal error.

-- [PHP Reference](https://www.php.net/manual/en/language.references.return.php)

## Unsetting references

When you *unset* the *reference*, you just break the *binding* between *variable name* and *variable content*. This does not mean that *variable content* will be destroyed. For example:

```php
<?php

$a = 1;
$b =& $a;
unset($a);

?>
```

won't *unset* `$b`, just `$a`.

Again, it might be useful to think about this as analogous to the Unix `unlink` call.

-- [PHP Reference](https://www.php.net/manual/en/language.references.unset.php)

## Spotting references

Many syntax constructs in PHP are implemented via referencing mechanisms, so everything mentioned herein about *reference binding* also applies to these constructs. Some constructs, like *passing* and *returning by reference*, are mentioned above. Other constructs that use references are:

### Global references

When you declare a *variable* as *global `$var`* you are in fact creating *reference* to a *global variable*. That means, this is the same as:

```php
<?php

$var =& $GLOBALS["var"];

?>
```

This also means that *unsetting* `$var` won't *unset* the `global variable`.

-- [PHP Reference](https://www.php.net/manual/en/language.references.spot.php)

[▵ Up](#references)
[⌂ Home](../../../README.md)
[▲ Previous: Variables](../literals_constants_variables/variables.md)
[▼ Next: Types](../types/types.md)
