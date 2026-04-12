[⌂ Home](../../../../README.md)
[▲ Previous: Autoloading classes](../classes/autoloading_classes.md)
[▼ Next: Interfaces](../interfaces/interfaces.md)

# Abstract classes

## Definition

> In a language that supports *inheritance*, an *abstract class*, or *abstract base class (ABC)*, is a *class* that cannot be directly instantiated. By contrast, a *concrete class* is a class that can be directly *instantiated*. *Instantiation* of an **abstract class** can occur only indirectly, via a *concrete subclass*.
>
> An *abstract class* is either labeled as such explicitly or it may simply specify *abstract methods* (or *virtual methods*). An *abstract class* may provide *implementations* of some *methods*, and may also specify *virtual methods* via signatures that are to be implemented by direct or indirect *descendants* of the *abstract class*. Before a *class derived* from an *abstract class* can be *instantiated*, all *abstract methods* of its *parent classes* must be *implemented* by some *class* in the *derivation chain*.

Most *object-oriented programming languages* allow the programmer to specify which *classes* are considered *abstract* and will not allow these to be *instantiated*. For example, in Java, C# and PHP, the *keyword* `abstract` is used. In C++, an *abstract class* is a class having at least one *abstract method* given by the appropriate syntax in that language (a pure virtual function in C++ parlance).

A *class* consisting of only *pure virtual methods* is called a *pure abstract base class (pure ABC)* in C++ and is also known as an interface by users of the language. Other languages, notably Java and C#, support a variant of *abstract classes* called an *interface* via a *keyword* in the language. In these languages, *multiple inheritance* is not allowed, but a *class* can implement multiple *interfaces*. Such a *class* can only contain *abstract publicly accessible methods*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Class_(programming)#Abstract)

## Description

PHP has ***abstract classes***, ***methods***, and ***properties***. *Classes* defined as *abstract* cannot be *instantiated*, and any *class* that contains at least one *abstract method* or *property* must also be *abstract*. *Methods* defined as *abstract* simply declare the method's signature and whether it is *public* or *protected*; they cannot define the *implementation*. *Properties* defined as *abstract* may *declare* a requirement for *get* or *set behavior*, and may provide an implementation for one, but not both, operations.

When inheriting from an *abstract class*, all *methods* marked *abstract* in the *parent's class declaration* must be *defined* by the *child class*, and follow the usual *inheritance* and *signature compatibility rules*.

As of PHP 8.4, an *abstract class* may *declare* an *abstract property*, either *public* or *protected*. A *protected abstract property* may be satisfied by a *property* that is readable/writeable from either *protected* or *public scope*.

An *abstract property* may be satisfied either by a standard *property* or by a *property* with defined *hooks*, corresponding to the required operation.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.abstract.php#language.oop5.abstract)

*Example: Abstract class*

```php
<?php

abstract class SomeAbstractClass
{
    private const string SOME_CONSTANT = 'constant';
    protected string $someProperty = 'property';

    public function someMethod(): void
    {
        print(
            $this->getLabel(static::class) . ': ' . PHP_EOL
            . self::SOME_CONSTANT . PHP_EOL
            . $this->someProperty . PHP_EOL
        );
    }

    abstract protected function getLabel(string $name): string;
}

class SomeClass extends SomeAbstractClass
{
    protected function getLabel(string $name): string
    {
        return "The content of the {$name}";
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
The content of the SomeClass:
constant
property
```

**Source code**:
[Example](../../../../examples/code/classes_interfaces_traits/abstract_classes/abstract_class.php)

*Example: Abstract class without abstract members*

```php
<?php

abstract class Datum
{
    protected string $description;

    public function formatDescriptionAsText(): string
    {
        return "Description: " . $this->description;
    }
}

class Content extends Datum
{
    public function __construct(
        protected string $core,
        protected string $description = ""
    ) {
    }

    public function formatCoreAsText(): string
    {
        return "Core: " . $this->core;
    }

    public function show(): void
    {
        print(
            $this->formatDescriptionAsText() . PHP_EOL
            . $this->formatCoreAsText() . PHP_EOL
        );
    }
}

$lectio = new Content(
    "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
    "De beneficiis lectionis"
);

$lectio->show();

```

**Result (PHP 8.4)**:

```
Description: De beneficiis lectionis
Core: In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.
```

**Source code**:
[Example](../../../../examples/code/classes_interfaces_traits/abstract_classes/abstract_class_without_abstract_members.php)

## Abstract method

*Example: Abstract method example*

```php
<?php

abstract class AbstractClass
{
    // Force extending class to define this method
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Common method
    public function printOut()
    {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue()
    {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1();
$class1->printOut();
echo $class1->prefixValue('FOO_'), "\n";

$class2 = new ConcreteClass2();
$class2->printOut();
echo $class2->prefixValue('FOO_'), "\n";

?>
```

The above example will output:

```
ConcreteClass1
FOO_ConcreteClass1
ConcreteClass2
FOO_ConcreteClass2
```

*Example: Abstract method example*

```php
<?php

abstract class AbstractClass
{
    // An abstract method only needs to define the required arguments
    abstract protected function prefixName($name);
}

class ConcreteClass extends AbstractClass
{
    // A child class may define optional parameters which are not present in the parent's signature
    public function prefixName($name, $separator = ".")
    {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }

        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreteClass();
echo $class->prefixName("Pacman"), "\n";
echo $class->prefixName("Pacwoman"), "\n";

?>
```

The above example will output:

```
Mr. Pacman
Mrs. Pacwoman
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.abstract.php#language.oop5.abstract)

*Example: Abstract method*

```php
<?php

abstract class SomeAbstractClass
{
    abstract protected function process(float $value1, float $value2): float;

    public function someMethod(float $value1, float $value2): void
    {
        print('Result: ' . $this->process($value1, $value2) . PHP_EOL);
    }
}

class SomeClass extends SomeAbstractClass
{
    protected function process(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }
}

class OtherClass extends SomeAbstractClass
{
    protected function process(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }
}

$someObject = new SomeClass();
$someObject->someMethod(2, 3);

$otherObject = new OtherClass();
$otherObject->someMethod(2, 3);

```

**Result (PHP 8.4)**:

```
Result: 5
Result: 6
```

**Source code**:
[Example](../../../../examples/code/classes_interfaces_traits/abstract_classes/abstract_method.php)

## Abstract property (hooks)

*Example: Abstract property example*

```php
<?php

abstract class A
{
    // Extending classes must have a publicly-gettable property
    abstract public string $readable {
        get;
    }

    // Extending classes must have a protected- or public-writeable property
    abstract protected string $writeable {
        set;
    }

    // Extending classes must have a protected or public symmetric property
    abstract protected string $both {
        get;
        set;
    }
}

class C extends A
{
    // This satisfies the requirement and also makes it settable, which is valid
    public string $readable;

    // This would NOT satisfy the requirement, as it is not publicly readable
    protected string $readable;

    // This satisfies the requirement exactly, so is sufficient.
    // It may only be written to, and only from protected scope
    protected string $writeable {
        set => $value;
    }

    // This expands the visibility from protected to public, which is fine
    public string $both;
}

?>
```

An *abstract property* on an *abstract class* may provide *implementations* for any *hook*, but must have either *get* or *set* *declared* but not *defined* (as in the example above).

*Example: Abstract property with hooks example*

```php
<?php

abstract class A
{
    // This provides a default (but overridable) set implementation,
    // and requires child classes to provide a get implementation
    abstract public string $foo {
        get;

        set {
            $this->foo = $value;
        }
    }
}

?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.abstract.php#language.oop5.abstract)

*Example: Abstract property (hooks)*

```php
<?php

abstract class SomeAbstractClass
{
    abstract protected string $someProperty {
        set;
        get;
    }

    abstract protected string $someSetProperty {
        set;
    }

    abstract protected string $someGetProperty {
        get;
    }

    public function someMethod(string $value): void
    {
        $this->someSetProperty = $value;
    }

    public function otherMethod(): string
    {
        return $this->someProperty . ' ' . $this->someGetProperty;
    }
}

class SomeClass extends SomeAbstractClass
{
    public string $someProperty;

    protected string $someSetProperty {
        set => $this->someGetProperty = $value . '>';
    }

    protected string $someGetProperty = '' {
        get => '<' . $this->someGetProperty;
    }
}

$someObject = new SomeClass();
$someObject->someProperty = 'some';
$someObject->someMethod('value');
print($someObject->otherMethod() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
some <value>
```

**Source code**:
[Example](../../../../examples/code/classes_interfaces_traits/abstract_classes/abstract_property_hooks.php)

*Example: Abstract class with abstract members*

```php
<?php

abstract class Value
{
    abstract protected string $description{
        set;
        get;
    }
    abstract public function show(): void;

    public function __construct(
        public float $value = 0,
        public string $label = ""
    ) {
        $this->value = $value;
        $this->label = $label;
    }
}

class Datum extends Value
{
    public string $description;

    public function __construct(float $value, string $label, string $description = "")
    {
        $this->value = $value;
        $this->label = $label;
        $this->description = $description;
    }

    public function show(): void
    {
        print("Value: " . $this->value
            . "\nLabel: " . $this->label
            . "\nDescription: " . $this->description . "\n"
        );
    }
}

class Content extends Datum
{
}

$page = new Content(666, "Page of Harry Potter book", "The satanistic ritual hidden in the book for kids. Oh noes!");
$page->show();

```

**Result (PHP 8.4)**:

```
Value: 666
Label: Page of Harry Potter book
Description: The satanistic ritual hidden in the book for kids. Oh noes!
```

**Source code**:
[Example](../../../../examples/code/classes_interfaces_traits/abstract_classes/abstract_class_with_abstract_members.php)

[▵ Up](#abstract-classes)
[⌂ Home](../../../../README.md)
[▲ Previous: Autoloading classes](../classes/autoloading_classes.md)
[▼ Next: Interfaces](../interfaces/interfaces.md)
