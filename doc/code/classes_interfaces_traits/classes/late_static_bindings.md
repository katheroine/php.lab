[⌂ Home](../../../README.md)
[▲ Previous: Anonymous classes](./anonymous_classes.md)

# Late static bindings

PHP implements a feature called ***late static bindings*** which can be used to reference the called *class* in a context of *static inheritance*.

More precisely, *late static bindings* work by storing the *class* named in the last "non-forwarding call". In case of *static method calls*, this is the *class explicitly named* (usually the one on the left of the `::` *operator*); in case of *non static method calls*, it is the *class* of the object. A "forwarding call" is a *static* one that is introduced by `self::`, `parent::`, `static::`, or, if going up in the *class* hierarchy, `forward_static_call()`. The function `get_called_class()` can be used to retrieve a *string* with the *name* of the called *class* and `static::` introduces its *scope*.

This feature was named *late static bindings* with an internal perspective in mind. *Late binding* comes from the fact that `static::` will not be resolved using the *class* where the method is defined but it will rather be computed using *runtime* information. It was also called a *static binding* as it can be used for (but is not limited to) *static method calls*.

## Limitations of `self::`

*Static references* to the current *class* like `self::` or `__CLASS__` are resolved using the *class* in which the *function* belongs, as in where it was defined:

*Example: `self::` usage*

```php
<?php

class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test();

?>
```

The above example will output:

```
A
```

## Late static bindings usage

*Late static bindings* tries to solve that limitation by introducing a *keyword* that references the *class* that was initially called at *runtime*. Basically, a *keyword* that would allow referencing `B` from `test()` in the previous example. It was decided not to introduce a new *keyword* but rather use static that was already reserved.

*Example: `static::` simple usage*

```php
<?php

class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::who(); // Here comes Late Static Bindings
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test();

?>
```

The above example will output:

```
B
```

Note:

In *non-static contexts*, the called *class* will be the *class* of the *object instance*. Since `$this->` will try to call *private methods* from the same *scope*, using `static::` may give different results. Another difference is that `static::` can only refer to *static properties*.

*Example: `static::` usage in a non-static context*

```php
<?php

class A
{
    private function foo()
    {
        echo "Success!\n";
    }

    public function test()
    {
        $this->foo();
        static::foo();
    }
}

class B extends A
{
    /* foo() will be copied to B, hence its scope will still be A and
    * the call be successful */
}

class C extends A
{
    private function foo()
    {
        /* Original method is replaced; the scope of the new one is C */
    }
}

$b = new B();
$b->test();

$c = new C();
try {
    $c->test();
} catch (Error $e) {
    echo $e->getMessage();
}

?>
```

The above example will output:

```
Success!
Success!
Success!
Call to private method C::foo() from scope A
```

Note:

*Late static bindings* resolution will stop at a fully resolved *static call* with no fallback. On the other hand, *static calls* using *keywords* like `parent::` or `self::` will forward the calling information.

*Example: Forwarding and non-forwarding calls*

```php
<?php

class A
{
    public static function foo()
    {
        static::who();
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

class B extends A
{
    public static function test()
    {
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

class C extends B
{
    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

C::test();

?>
```

The above example will output:

```
A
C
C
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.late-static-bindings.php)

[▵ Up](#late-static-bindings)
[⌂ Home](../../../README.md)
[▲ Previous: Anonymous classes](./anonymous_classes.md)
