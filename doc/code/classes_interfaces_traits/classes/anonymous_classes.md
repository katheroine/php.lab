[⌂ Home](../../../README.md)
[▲ Previous: Inheritance](./inheritance.md)
[▼ Next: Autoloading classes](./autoloading_classes.md)

# Anonymous classes

***Anonymous classes*** are useful when simple, one-off *objects* need to be created.

```php
<?php

// Using an explicit class
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// Using an anonymous class
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.anonymous.php#language.oop5.anonymous)

*Example: Anonymous class*

```php
<?php

$someObject = new class {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
        );
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous class
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class.php)

They can pass *arguments* through to their *constructors*, *extend* other *classes*, *implement* *interfaces*, and *use* *traits* just like a normal *class* can:

```php
<?php

class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump(new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    use SomeTrait;
});
```

The above example will output:

```
object(class@anonymous)#1 (1) {
  ["Command line code0x104c5b612":"class@anonymous":private]=>
  int(10)
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.anonymous.php#language.oop5.anonymous)

*Example: Anonymouc class with constructor*

```php
<?php

$someObject = new class ('with constructor and...') {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';
    private readonly string $someReadonlyProperty;

    public function __construct(
        private string $otherProperty,
        string $someParameter = 'with readonly property'
    ) {
        $this->someReadonlyProperty = $someParameter;
    }

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . " class\n"
            . $this->otherProperty . PHP_EOL
            . $this->someReadonlyProperty . PHP_EOL
        );
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous class
with constructor and...
with readonly property
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_with_constructor.php)

*Example: Anonymous class extending class*

```php
<?php

class SomeClass
{
    protected string $otherProperty = 'extending other class';
}

$someObject = new class extends SomeClass {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
            . $this->otherProperty . PHP_EOL
        );
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous class
extending other class
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_extending_class.php)

*Example: Anonymous class implementing interface*

```php
<?php

interface SomeInterface
{
    public function someMethod(): void;
}

$someObject = new class implements SomeInterface {
    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . " class\nimplementing interface\n"
        );
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous class
implementing interface
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_implementing_interface.php)

*Example: Anonymous class using trait*

```php
<?php

trait SomeTrait
{
    protected const string OTHER_CONSTANT = 'trait';

    protected function otherMethod(): void
    {
        print('using ' . self::OTHER_CONSTANT . PHP_EOL);
    }
}

$someObject = new class {
    use SomeTrait;

    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
        );

        $this->otherMethod();
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous class
using trait
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_using_trait.php)

Nesting an *anonymous class* within another *class* does not give it *access* to any *private* or *protected methods* or *properties* of that outer *class*. In order to use the outer *class protected properties* or *methods*, the *anonymous class* can extend the outer *class*. To use the *private properties* of the outer *class* in the anonymous class, they must be *passed* through its *constructor*:

```php
<?php

class Outer
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        return new class($this->prop) extends Outer {
            private $prop3;

            public function __construct($prop)
            {
                $this->prop3 = $prop;
            }

            public function func3()
            {
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}

echo (new Outer)->func2()->func3();
```

The above example will output:

```
6
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.anonymous.php#language.oop5.anonymous)

*Example: Anonymous class object as another class property*

```php
<?php

class SomeClass
{
    public object $someObjectProperty;

    public function __construct(string $someParameter)
    {
        $this->someObjectProperty = new class ($someParameter) {
            public function __construct(
                private string $someProperty
            ) {
            }

            public function setProperty(string $value)
            {
                $this->someProperty = $value;
            }

            public function getProperty(): string
            {
                return $this->someProperty;
            }
        };
    }
}

$someObject = new SomeClass('nested');
print($someObject->someObjectProperty->getProperty() . PHP_EOL);

$someObject->someObjectProperty->setProperty('modified');
print($someObject->someObjectProperty->getProperty() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
nested
modified
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_object_as_another_class_property.php)

All *objects* created by the same *anonymous class declaration* are *instances* of that very *class*.

```php
<?php
function anonymous_class()
{
    return new class {};
}

if (get_class(anonymous_class()) === get_class(anonymous_class())) {
    echo 'same class';
} else {
    echo 'different class';
}
```

The above example will output:

```
same class
```

Note:

Note that *anonymous classes* are assigned a *name* by the *engine*, as demonstrated in the following example. This *name* has to be regarded an implementation detail, which should not be relied upon.

```php
<?php
echo get_class(new class {});
```

The above example will output something similar to:

```
class@anonymous/in/oNi1A0x7f8636ad2021
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.anonymous.php#language.oop5.anonymous)

*Example: Anonymouns class object class*

```php
<?php

$someObject = new class {
};

print('Type: ' . gettype($someObject) . PHP_EOL);
print('Class: ' . get_class($someObject) . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type: object
Class: class@anonymous/projects/php.lab/example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_object_type.php:3$0
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/anonymous_class_object_class.php)

## Readonly anonymous classes

As of PHP 8.3.0, the `readonly` *modifier* can be applied to *anonymous classes*.

*Example: Defining a readonly anonymous class*

```php
<?php
// Using an anonymous class
var_dump(new readonly class('[DEBUG]') {
    public function __construct(private string $prefix)
    {
    }

    public function log($msg)
    {
        echo $this->prefix . ' ' . $msg;
    }
});
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.anonymous.php)

*Example: Readonly anonymouc class*

```php
<?php

$someObject = new readonly class {
    private const string SOME_CONSTANT = 'some';

    public function __construct(
        private string $someProperty = 'anonymous readonly'
    ) {}

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
        );
    }
};

$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Some anonymous readonly class
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_classes/readonly_anonymous_class.php)

[▵ Up](#anonymous-classes)
[⌂ Home](../../../README.md)
[▲ Previous: Inheritance](./inheritance.md)
[▼ Next: Autoloading classes](./autoloading_classes.md)
