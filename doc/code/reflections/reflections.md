[⌂ Home](../../../README.md)
[▲ Previous: Attributes](../attributes/attributes.md)
[▼ Next: Namespaces](../namespaces/namespaces.md)

# Reflections

PHP comes with a complete *reflection API* that adds the ability to *introspect* *classes*, *interfaces*, *functions*, *methods* and *extensions*. Additionally, the *reflection API* offers ways to retrieve *doc comments* for *functions*, *classes* and *methods*.

Please note that certain parts of the *internal API* are missing the necessary code to work with the *reflection extension*. E.g., an *internal PHP class* might be missing *reflection data* for *properties*. These few cases are considered bugs, however, so they should be discovered and fixed.

-- [PHP Reference](https://www.php.net/manual/en/intro.reflection.php)

## Examples

Many examples exist within the *reflection* documentation, typically within the `__construct` documentation for each *class*.

*Example: Reflection example from shell (a terminal)*

```console
$ php --rf strlen
$ php --rc finfo
$ php --re json
$ php --ri dom
```

The above example will output something similar to:

```
Function [ <internal:Core> function strlen ] {

  - Parameters [1] {
    Parameter #0 [ <required> $str ]
  }
}

Class [ <internal:fileinfo> class finfo ] {

  - Constants [0] {
  }

  - Static properties [0] {
  }

  - Static methods [0] {
  }

  - Properties [0] {
  }

  - Methods [4] {
    Method [ <internal:fileinfo, ctor> public method finfo ] {

      - Parameters [2] {
        Parameter #0 [ <optional> $options ]
        Parameter #1 [ <optional> $arg ]
      }
    }

    Method [ <internal:fileinfo> public method set_flags ] {

      - Parameters [1] {
        Parameter #0 [ <required> $options ]
      }
    }

    Method [ <internal:fileinfo> public method file ] {

      - Parameters [3] {
        Parameter #0 [ <required> $filename ]
        Parameter #1 [ <optional> $options ]
        Parameter #2 [ <optional> $context ]
      }
    }

    Method [ <internal:fileinfo> public method buffer ] {

      - Parameters [3] {
        Parameter #0 [ <required> $string ]
        Parameter #1 [ <optional> $options ]
        Parameter #2 [ <optional> $context ]
      }
    }
  }
}

Extension [ <persistent> extension #23 json version 1.2.1 ] {

  - Constants [10] {
    Constant [ integer JSON_HEX_TAG ] { 1 }
    Constant [ integer JSON_HEX_AMP ] { 2 }
    Constant [ integer JSON_HEX_APOS ] { 4 }
    Constant [ integer JSON_HEX_QUOT ] { 8 }
    Constant [ integer JSON_FORCE_OBJECT ] { 16 }
    Constant [ integer JSON_ERROR_NONE ] { 0 }
    Constant [ integer JSON_ERROR_DEPTH ] { 1 }
    Constant [ integer JSON_ERROR_STATE_MISMATCH ] { 2 }
    Constant [ integer JSON_ERROR_CTRL_CHAR ] { 3 }
    Constant [ integer JSON_ERROR_SYNTAX ] { 4 }
  }

  - Functions {
    Function [ <internal:json> function json_encode ] {

      - Parameters [2] {
        Parameter #0 [ <required> $value ]
        Parameter #1 [ <optional> $options ]
      }
    }
    Function [ <internal:json> function json_decode ] {

      - Parameters [3] {
        Parameter #0 [ <required> $json ]
        Parameter #1 [ <optional> $assoc ]
        Parameter #2 [ <optional> $depth ]
      }
    }
    Function [ <internal:json> function json_last_error ] {

      - Parameters [0] {
      }
    }
  }
}

dom

DOM/XML => enabled
DOM/XML API Version => 20031129
libxml Version => 2.7.3
HTML Support => enabled
XPath Support => enabled
XPointer Support => enabled
Schema Support => enabled
RelaxNG Support => enabled
```

-- [PHP Reference](https://www.php.net/manual/en/reflection.examples.php)

## Extending

If you want to create specialized versions of the *built-in classes* (say, for creating colorized HTML when being exported, having easy-access *member variables* instead of *methods* or having *utility methods*), you may go ahead and *extend* them.

*Example: Extending the built-in classes*

```php
<?php
/**
 * My Reflection_Method class
 */
class My_Reflection_Method extends ReflectionMethod
{
    public $visibility = array();

    public function __construct($o, $m)
    {
        parent::__construct($o, $m);
        $this->visibility = Reflection::getModifierNames($this->getModifiers());
    }
}

/**
 * Demo class #1
 *
 */
class T {
    protected function x() {}
}

/**
 * Demo class #2
 *
 */
class U extends T {
    function x() {}
}

// Print out information
var_dump(new My_Reflection_Method('U', 'x'));
?>
```

The above example will output something similar to:

```
object(My_Reflection_Method)#1 (3) {
  ["visibility"]=>
  array(1) {
    [0]=>
    string(6) "public"
  }
  ["name"]=>
  string(1) "x"
  ["class"]=>
  string(1) "U"
}
```

Caution

If you're *overwriting* the *constructor*, remember to *call* the *parent's constructor* before any code you insert. Failing to do so will result in the following: `Fatal error: Internal error: Failed to retrieve the reflection object`

-- [PHP Reference](https://www.php.net/manual/en/reflection.extending.php)

## The `Reflection` class

### Class synopsis

```php
class Reflection {
/* Methods */
public static export(Reflector $reflector, bool $return = false): string
public static getModifierNames(int $modifiers): array
}
```

-- [PHP Reference](https://www.php.net/manual/en/class.reflection.php)

## Reflection classes

* `ReflectionClass`
* `ReflectionClassConstant`
* `ReflectionConstant`
* `ReflectionEnum`
* `ReflectionEnumUnitCase`
* `ReflectionEnumBackedCase`
* `ReflectionZendExtension`
* `ReflectionExtension`
* `ReflectionFunction`
* `ReflectionFunctionAbstract`
* `ReflectionMethod`
* `ReflectionNamedType`
* `ReflectionObject`
* `ReflectionParameter`
* `ReflectionProperty`
* `ReflectionType`
* `ReflectionUnionType`
* `ReflectionGenerator`
* `ReflectionFiber`
* `ReflectionIntersectionType`
* `ReflectionReference`
* `ReflectionAttribute`
* `Reflector`
* `ReflectionException`
* `PropertyHookType`

-- [PHP Reference](https://www.php.net/manual/en/book.reflection.php)

[▵ Up](#reflections)
[⌂ Home](../../../README.md)
[▲ Previous: Attributes](../attributes/attributes.md)
[▼ Next: Namespaces](../namespaces/namespaces.md)
