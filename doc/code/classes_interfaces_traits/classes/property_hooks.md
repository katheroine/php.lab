## Property hooks

***Property hooks***, also known as *property accessors* in some other languages, are a way to *intercept* and *override* the *read* and *write behavior* of a *property*. This functionality serves two purposes:

It allows for *properties* to be used directly, without *get-* and *set-* *methods*, while leaving the option open to add additional behavior in the future. That renders most boilerplate *get/set methods* unnecessary, even without using *hooks*.
It allows for *properties* that describe an *object* without needing to store a value directly.
There are two *hooks* available on *non-static properties*: *get* and *set*. They allow overriding the *read* and *write behavior* of a *property*, respectively. *Hooks* are available for both *typed* and *untyped properties*.

A property may be *backed* or *virtual*. A *backed property* is one that actually stores a *value*. Any *property* that has no *hooks* is *backed*. A *virtual property* is one that has *hooks* and those *hooks* do not interact with the *property* itself. In this case, the *hooks* are effectively the same as *methods*, and the *object* does not use any space to store a *value* for that *property*.

*Property hooks* are incompatible with *readonly properties*. If there is a need to restrict access to a *get* or *set operation* in addition to altering its *behavior*, use *asymmetric property visibility*.

[Type declaration, default value and set argument type in the set explicit-argument version are obligatory. -- KK]

[Static properties cannot have hooks, what is obvious considering the need of using `$this` in case of backed property hook and lack of memory usage in case of virtual property hook. -- KK]

Note: Version Information

*Property hooks* were introduced in PHP 8.4.

### Backed hooks

The general syntax for declaring a *hook* is as follows.

*Example: Property hooks (full version)*

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get {
            if ($this->modified) {
                return $this->foo . ' (modified)';
            }
            return $this->foo;
        }
        set(string $value) {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}

$example = new Example();
$example->foo = 'changed';
print $example->foo;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

At least one of the *hooks* references `$this->foo`, the *property* itself. That means the *property* will be *backed*. When calling `$example->foo = 'changed'`, the provided string will be first cast to lowercase, then saved to the *backing value*. When reading from the *property*, the previously saved value may conditionally be appended with additional text.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string $property) {
            $this->someProperty = '<' . $property . '>';
        }
        get {
            return trim($this->someProperty, '<>');
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook.php)

The `$foo` *property* ends in `{}`, rather than a semicolon. That indicates the presence of *hooks*[...] Both *hooks* have a *body*, denoted by `{}`, that may contain arbitrary code.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

Both a *get* and *set hook* are *defined*, although it is allowed to *define* only one or the other.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

On a *backed property*, omitting a *get* or *set hook* means the *default read* or *write behavior* will be used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class asymetric backed property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string $property) {
            $this->someProperty = '<' . $property . '>';
        }
    }
}

class OtherClass
{
    public int $otherProperty = 0 {
        get {
            return $this->otherProperty + 1;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

$otherObject = new OtherClass();

var_dump($otherObject);
print(PHP_EOL);

$otherObject->otherProperty = 3;

var_dump($otherObject);
print(PHP_EOL);

print($otherObject->otherProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

<pineapple>

object(OtherClass)#2 (1) {
  ["otherProperty"]=>
  int(0)
}

object(OtherClass)#2 (1) {
  ["otherProperty"]=>
  int(3)
}

4

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_asymetric_backed_property_hook.php)

The *set hook* additionally allows specifying the *type* and *name* of an incoming *value*, using the same syntax as a *method*. The *type* must be either the same as the *type* of the *property*, or *contravariant* (wider) to it. For instance, a *property* of *type `string`* could have a set *hook* that accepts `string|Stringable`, but not one that only accepts `array`.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook contravariance*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string|array|object $property) {
            $this->someProperty = serialize($property);
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = [1, 2, 3];

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

$someObject->someProperty = (object) [
    'color' => 'green',
    'taste' => 'sour',
];

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(30) "a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}"
}

a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(66) "O:8:"stdClass":2:{s:5:"color";s:5:"green";s:5:"taste";s:4:"sour";}"
}

O:8:"stdClass":2:{s:5:"color";s:5:"green";s:5:"taste";s:4:"sour";}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_contravariance.php)

There are a number of shorthand syntax variants as well to handle common cases.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

If the *set hook's parameter type* is the same as the *property type* (which is typical), it may be omitted. In that case, the *value* to set is automatically given the name `$value`.

*Example: Property set defaults*

This example is equivalent to the previous.

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');

        set {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook shorthand omitted parameter type*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set {
            $this->someProperty = '<' . $value . '>';
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_shorthand_omitted_parameter_type.php).

If the *get hook* is a single *expression*, then the `{}` may be omitted and replaced with an *arrow expression*.

*Example: Property get expression*

This example is equivalent to the previous.

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');

        set(string $value) {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

If the *set hook* is only setting a modified version of the passed in *value*, then it may also be simplified to an *arrow expression*. The value the *expression* evaluates to will be set on the *backing value*.

*Example: Property set expression*

```php
<?php
class Example
{
    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');
        set => strtolower($value);
    }
}
?>
```

This example is not quite equivalent to the previous, as it does not also modify `$this->modified`. If multiple statements are needed in the set *hook body*, use the *braces version*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook shorthand expression*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set => $this->someProperty = '<' . $value . '>';
        get => trim($this->someProperty, '<>');
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_shorthand_expression.php)

A *property* may implement zero, one, or both *hooks* as the situation requires. All shorthand versions are mutually-independent. That is, using a *short-get* with a *long-set*, or a *short-set* with an explicit type, or so on is all valid.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

Note: *Hooks* can be defined when using *constructor property promotion*. However, when doing so, values provided to the *constructor* must match the *type* associated with the *property*, regardless of what the set *hook* might allow. Consider the following:

```php
<?php
class Example
{
    public function __construct(
        public private(set) DateTimeInterface $created {
            set (string|DateTimeInterface $value) {
                if (is_string($value)) {
                    $value = new DateTimeImmutable($value);
                }
                $this->created = $value;
            }
        },
    ) {
    }
}
```

Internally, the engine decomposes this to the following:

```php
<?php
class Example
{
    public private(set) DateTimeInterface $created {
        set (string|DateTimeInterface $value) {
            if (is_string($value)) {
                $value = new DateTimeImmutable($value);
            }
            $this->created = $value;
        }
    }

    public function __construct(
        DateTimeInterface $created,
    ) {
        $this->created = $created;
    }
}
```

Any attempts to set the *property* outside the *constructor* will allow either `string` or `DateTimeInterface` values, but the constructor will only allow `DateTimeInterface`. This is because the *defined type* for the *property* (`DateTimeInterface`) is used as the *parameter type* within the *constructor signature*, regardless of what the *set hook* allows. If this kind of behavior is needed from the *constructor*, *constructor property promotion* cannot be used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class property hook and construction property promotion*

```php
<?php

class SomeClass
{
    function __construct(
        public string $someProperty = '' {
            set(string $property) {
                $this->someProperty = '<' . $property . '>';
            }
            get {
                return trim($this->someProperty, '<>');
            }
        }
    ) {
    }
}

$someObject = new SomeClass('mango');

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(7) "<mango>"
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_and_constructor_property_promotion.php)

### Virtual properties

***Virtual properties*** are *properties* that have no *backing value*. A *property* is *virtual* if neither its *get* nor *set hook* references the *property* itself using exact syntax. That is, a *property* named `$foo` whose *hook* contains `$this->foo` will be *backed*. But the following is not a *backed property*, and will error:

*Example: Invalid virtual property*

```php
<?php
class Example
{
    public string $foo {
        get {
            $temp = __PROPERTY__;
            return $this->$temp; // Doesn't refer to $this->foo, so it doesn't count.
        }
    }
}
?>
```

For *virtual properties*, if a *hook* is omitted then that operation does not exist and trying to use it will produce an error. *Virtual properties* take up no memory space in an *object*. *Virtual properties* are suited for "derived" properties, such as those that are the combination of two other properties.

*Example: Virtual property*

```php
<?php
class Rectangle
{
    // A virtual property.
    public int $area {
        get => $this->h * $this->w;
    }

    public function __construct(public int $h, public int $w) {}
}

$s = new Rectangle(4, 5);
print $s->area; // prints 20
$s->area = 30; // Error, as there is no set operation defined.
?>
```

Defining both a *get* and *set hook* on a *virtual property* is also allowed.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class virtual property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = 'grapes';
    public string $otherProperty {
        get {
            return 'sweet ' . $this->someProperty;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(6) "grapes"
}

sweet grapes

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(9) "pineapple"
}

sweet pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_virtual_property_hook.php)

Scoping

All *hooks* operate in the *scope* of the *object* being modified. That means they have access to all *public*, *private*, or *protected methods* of the *object*, as well as any *public*, *private*, or *protected properties*, including *properties* that may have their own *property hooks*. Accessing another *property* from within a *hook* does not bypass the *hooks* defined on that *property*.

The most notable implication of this is that non-trivial hooks may sub-call to an arbitrarily complex method if they wish.

*Example: Calling a method from a hook*

```php
<?php
class Person {
    public string $phone {
        set => $this->sanitizePhone($value);
    }

    private function sanitizePhone(string $value): string {
        $value = ltrim($value, '+');
        $value = ltrim($value, '1');

        if (!preg_match('/\d\d\d\-\d\d\d\-\d\d\d\d/', $value)) {
            throw new \InvalidArgumentException();
        }
        return $value;
    }
}
?>
```

### References

Because the presence of *hooks* intercept the *read* and *write process* for *properties*, they cause issues when acquiring a *reference* to a *property* or with indirect modification, such as `$this->arrayProp['key'] = 'value';`. That is because any attempted modification of the *value* by *reference* would bypass a *set hook*, if one is defined.

In the rare case that getting a *reference* to a *property* that has *hooks* defined is necessary, the *get hook* may be prefixed with `&` to cause it to return by *reference*. Defining both `get` and `&get` on the same *property* is a syntax error.

Defining both `&get` and `set` hooks on a *backed property* is not allowed. As noted above, writing to the *value* returned by *reference* would bypass the *set hook*. On *virtual properties*, there is no necessary common value shared between the two *hooks*, so defining both is allowed.

Writing to an *index* of an *array property* also involves an *implicit reference*. For that reason, writing to a *backed array property* with hooks defined is allowed if and only if it defines only a `&get` hook. On a *virtual property*, writing to the *array* returned from either `get` or `&get` is legal, but whether that has any impact on the *object* depends on the *hook* implementation.

Overwriting the entire *array property* is fine, and behaves the same as any other *property*. Only working with elements of the array require special care.

### Serialization

PHP has a number of different ways in which an *object* may be *serialized*, either for public consumption or for debugging purposes. The behavior of *hooks* varies depending on the use case. In some cases, the raw *backing value* of a *property* will be used, bypassing any *hooks*. In others, the *property* will be read or written "through" the *hook*, just like any other normal read/write action.

* `var_dump()`: Use raw value
* `serialize()`: Use raw value
* `unserialize()`: Use raw value
* `__serialize()`/`__unserialize()`: Custom logic, uses get/set hook
* *Array casting*: Use raw value
* `var_export()`: Use get hook
* `json_encode()`: Use get hook
* `JsonSerializable`: Custom logic, uses get hook
* `get_object_vars()`: Use get hook
* `get_mangled_object_vars()`: Use raw value

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php)
