[⌂ Home](../../../README.md)
[▲ Previous: Exceptions](../errors_and_exceptions/exceptions/exceptions.md)
[▼ Next: Reflections](../reflections/reflections.md)

# Attributes

## Description

PHP ***attributes*** provide structured, *machine-readable metadata* for *classes*, *methods*, *functions*, *parameters*, *properties*, and *constants*. They can be inspected at *runtime* via the `Reflection API`, enabling dynamic behavior without modifying code. *Attributes* provide a declarative way to *annotate* code with *metadata*.

Attributes enable the decoupling of a feature's implementation from its usage. While *interfaces* define structure by enforcing *methods*, *attributes* provide *metadata* across multiple elements, including *methods*, *functions*, *properties*, and *constants*. Unlike *interfaces*, which enforce *method implementations*, *attributes* *annotate* code without altering its structure.

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.overview.php#language.attributes.overview)

*Example: Attribute*

```php
<?php

#[Attribute]
class SomeAttribute
{
    public function __construct(public string $someArgument)
    {
    }
}

#[SomeAttribute('some function')]
function someFunction(#[SomeParamenterAttribute] string $someArgument)
{
}

#[SomeAttribute('some enum')]
enum SomeEnum
{
}

#[SomeAttribute('some interface')]
interface SomeInterface
{
}

#[SomeAttribute('some trait')]
trait SomeTrait
{
}

#[SomeAttribute('some interface')]
class someClass implements SomeInterface
{
    use SomeTrait;

    #[SomeAttribute('some class constant')]
    public const SOME_CONSTANT = 1024;

    #[SomeAttribute('some property')]
    private string $someProperty = 'hello';

    #[SomeAttribute('some method')]
    function someMethod(): void
    {
    }
}

$someAnonymousFunction = #[SomeAttribute('some anonymous function')] function() {};

$someAnonymousClassObject = new #[SomeAttribute('some anonymous class object')] class {};

function displayAttribute(ReflectionAttribute $attributeReflection)
{
    print(
        'Name: ' . $attributeReflection->getName() . PHP_EOL
        . 'Target: ' . $attributeReflection->getTarget() . PHP_EOL
        . 'Is repeated? ' . ($attributeReflection->isRepeated() ? 'yes' : 'no') . PHP_EOL
        . "Arguments:\n"
    );
    print_r($attributeReflection->getArguments());
    print(PHP_EOL);
}

$functionReflection = new ReflectionFunction('someFunction');
$attributeReflection = $functionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$paramenterReflection = $functionReflection->getParameters()[0];
$attributeReflection = $paramenterReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$enumReflection = new ReflectionEnum('SomeEnum');
$attributeReflection = $enumReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$classReflection = new ReflectionClass('SomeClass');
$attributeReflection = $classReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$interfaceReflection = $classReflection->getInterfaces()['SomeInterface'];
$attributeReflection = $interfaceReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$traitReflection = $classReflection->getTraits()['SomeTrait'];
$attributeReflection = $traitReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$constantReflection = $classReflection->getReflectionConstant('SOME_CONSTANT');
$attributeReflection = $constantReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$propertyReflection = $classReflection->getProperty('someProperty');
$attributeReflection = $propertyReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$methodReflection = $classReflection->getMethod('someMethod');
$attributeReflection = $methodReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousFunctionReflection = new ReflectionFunction($someAnonymousFunction);
$attributeReflection = $anonymousFunctionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousClassReflection = new ReflectionClass($someAnonymousClassObject);
$attributeReflection = $anonymousClassReflection->getAttributes()[0];
displayAttribute($attributeReflection);

```

**Result (PHP 8.4)**:

```
Name: SomeAttribute
Target: 2
Is repeated? no
Arguments:
Array
(
    [0] => some function
)

Name: SomeParamenterAttribute
Target: 32
Is repeated? no
Arguments:
Array
(
)

Name: SomeAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
    [0] => some enum
)

Name: SomeAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
    [0] => some interface
)

Name: SomeAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
    [0] => some interface
)

Name: SomeAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
    [0] => some trait
)

Name: SomeAttribute
Target: 16
Is repeated? no
Arguments:
Array
(
    [0] => some class constant
)

Name: SomeAttribute
Target: 8
Is repeated? no
Arguments:
Array
(
    [0] => some property
)

Name: SomeAttribute
Target: 4
Is repeated? no
Arguments:
Array
(
    [0] => some method
)

Name: SomeAttribute
Target: 2
Is repeated? no
Arguments:
Array
(
    [0] => some anonymous function
)

Name: SomeAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
    [0] => some anonymous class object
)

```

**Source code**:
[Example](../../../examples/code/attributes/attribute.php)

*Example: Attributes*

```php
<?php

#[Attribute]
class SomeFunctionAttribute
{
}

#[Attribute]
class SomeParamenterAttribute
{
}

#[Attribute]
class SomeEnumAttribute
{
}

#[Attribute]
class SomeInterfaceAttribute
{
}

#[Attribute]
class SomeTraitAttribute
{
}

#[Attribute]
class SomeClassAttribute
{
}

#[Attribute]
class SomeConstantAttribute
{
}

#[Attribute]
class SomePropertyAttribute
{
}

#[Attribute]
class SomeMethodAttribute
{
}

#[SomeFunctionAttribute]
function someFunction(#[SomeParamenterAttribute] string $someArgument)
{
}

#[SomeEnumAttribute]
enum SomeEnum
{
}

#[SomeInterfaceAttribute]
interface SomeInterface
{
}

#[SomeTraitAttribute]
trait SomeTrait
{
}

#[SomeClassAttribute]
class someClass implements SomeInterface
{
    use SomeTrait;

    #[SomeConstantAttribute]
    public const SOME_CONSTANT = 1024;

    #[SomePropertyAttribute]
    private string $someProperty = 'hello';

    #[SomeMethodAttribute]
    function someMethod(): void
    {
    }
}

$someAnonymousFunction = #[SomeAnonymousFunctionAttribute] function() {};

$someAnonymousClassObject = new #[SomeAnonymousClassAttribute] class {};

function displayAttribute(ReflectionAttribute $attributeReflection)
{
    print(
        'Name: ' . $attributeReflection->getName() . PHP_EOL
        . 'Target: ' . $attributeReflection->getTarget() . PHP_EOL
        . 'Is repeated? ' . ($attributeReflection->isRepeated() ? 'yes' : 'no') . PHP_EOL
        . "Arguments:\n"
    );
    print_r($attributeReflection->getArguments());
    print(PHP_EOL);
}

$functionReflection = new ReflectionFunction('someFunction');
$attributeReflection = $functionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$paramenterReflection = $functionReflection->getParameters()[0];
$attributeReflection = $paramenterReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$enumReflection = new ReflectionEnum('SomeEnum');
$attributeReflection = $enumReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$classReflection = new ReflectionClass('SomeClass');
$attributeReflection = $classReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$interfaceReflection = $classReflection->getInterfaces()['SomeInterface'];
$attributeReflection = $interfaceReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$traitReflection = $classReflection->getTraits()['SomeTrait'];
$attributeReflection = $traitReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$constantReflection = $classReflection->getReflectionConstant('SOME_CONSTANT');
$attributeReflection = $constantReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$propertyReflection = $classReflection->getProperty('someProperty');
$attributeReflection = $propertyReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$methodReflection = $classReflection->getMethod('someMethod');
$attributeReflection = $methodReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousFunctionReflection = new ReflectionFunction($someAnonymousFunction);
$attributeReflection = $anonymousFunctionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousClassReflection = new ReflectionClass($someAnonymousClassObject);
$attributeReflection = $anonymousClassReflection->getAttributes()[0];
displayAttribute($attributeReflection);

```

**Result (PHP 8.4)**:

```
Name: SomeFunctionAttribute
Target: 2
Is repeated? no
Arguments:
Array
(
)

Name: SomeParamenterAttribute
Target: 32
Is repeated? no
Arguments:
Array
(
)

Name: SomeEnumAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
)

Name: SomeClassAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
)

Name: SomeInterfaceAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
)

Name: SomeTraitAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
)

Name: SomeConstantAttribute
Target: 16
Is repeated? no
Arguments:
Array
(
)

Name: SomePropertyAttribute
Target: 8
Is repeated? no
Arguments:
Array
(
)

Name: SomeMethodAttribute
Target: 4
Is repeated? no
Arguments:
Array
(
)

Name: SomeAnonymousFunctionAttribute
Target: 2
Is repeated? no
Arguments:
Array
(
)

Name: SomeAnonymousClassAttribute
Target: 1
Is repeated? no
Arguments:
Array
(
)

```

**Source code**:
[Example](../../../examples/code/attributes/attributes.php)

## Attribute syntax

*Attribute syntax* consists of several key components. An *attribute declaration* starts with `#[` and ends with `]`. Inside, one or more *attributes* can be listed, separated by commas. The *attribute name* can be *unqualified*, *qualified*, or *fully-qualified*. *Arguments* to the *attribute* are optional and enclosed in parentheses `()`. *Arguments* can only be *literal values* or *constant expressions*. Both *positional* and *named argument* syntax are supported.

*Attribute names* and their arguments are resolved to a *class*, and the *arguments* are passed to its *constructor* when an *instance* of the *attribute* is requested through the *reflection API*. Therefore, it is recommended to introduce a *class* for each *attribute*.

*Example: Attribute syntax*

```php
<?php
// a.php
namespace MyExample;

use Attribute;

#[Attribute]
class MyAttribute
{
    const VALUE = 'value';

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }
}

// b.php

namespace Another;

use MyExample\MyAttribute;

#[MyAttribute]
#[\MyExample\MyAttribute]
#[MyAttribute(1234)]
#[MyAttribute(value: 1234)]
#[MyAttribute(MyAttribute::VALUE)]
#[MyAttribute(array("key" => "value"))]
#[MyAttribute(100 + 200)]
class Thing
{
}

#[MyAttribute(1234), MyAttribute(5678)]
class AnotherThing
{
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.syntax.php)

## Declaring attribute classes

It is recommended to define a separate *class* for each *attribute*. In the simplest case, an empty *class* with the `#[Attribute]` *declaration* is sufficient. The *attribute* can be *imported* from the *global namespace* using a *`use` statement*.

*Example: Simple attribute class*

```php
<?php

namespace Example;

use Attribute;

#[Attribute]
class MyAttribute
{
}
```

To restrict the *types* of *declarations* an *attribute* can be applied to, pass a *bitmask* as the first *argument* to the `#[Attribute]` *declaration*.

*Example: Using target specification to restrict where attributes can be used*

```php
<?php

namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
class MyAttribute
{
}
```

Declaring `MyAttribute` on another type will now throw an *exception* during the call to `ReflectionAttribute::newInstance()`

The following *targets* can be specified:

* `Attribute::TARGET_CLASS`
* `Attribute::TARGET_FUNCTION`
* `Attribute::TARGET_METHOD`
* `Attribute::TARGET_PROPERTY`
* `Attribute::TARGET_CLASS_CONSTANT`
* `Attribute::TARGET_PARAMETER`
* `Attribute::TARGET_ALL`

By default, an *attribute* can only be used once per *declaration*. To allow an *attribute* to be *repeatable*, specify it in the *bitmask* of the `#[Attribute]` *declaration* using the `Attribute::IS_REPEATABLE` *flag*.

*Example: Using `IS_REPEATABLE` to allow attribute on a declaration multiple times*

```php
<?php

namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class MyAttribute
{
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.classes.php)

### `Attribute` attribute

**Description**

Attributes offer the ability to add structured, machine-readable metadata information on declarations in code: Classes, methods, functions, parameters, properties and class constants can be the target of an attribute. The metadata defined by attributes can then be inspected at runtime using the Reflection APIs. Attributes could therefore be thought of as a configuration language embedded directly into code.

**Synopsis**

```php
#[\Attribute]
final class Attribute {
/* Constants */
const int TARGET_CLASS;
const int TARGET_FUNCTION;
const int TARGET_METHOD;
const int TARGET_PROPERTY;
const int TARGET_CLASS_CONSTANT;
const int TARGET_PARAMETER;
const int TARGET_CONSTANT;
const int TARGET_ALL;
const int IS_REPEATABLE;
/* Properties */
public int $flags;
/* Methods */
public __construct(int $flags = Attribute::TARGET_ALL)
}
```

**Predefined constants**

* `Attribute::TARGET_CLASS`
* `Attribute::TARGET_FUNCTION`
* `Attribute::TARGET_METHOD`
* `Attribute::TARGET_PROPERTY`
* `Attribute::TARGET_CLASS_CONSTANT`
* `Attribute::TARGET_PARAMETER`
* `Attribute::TARGET_CONSTANT`
* `Attribute::TARGET_ALL`
* `Attribute::IS_REPEATABLE`

**Properties**

* `flags`

-- [PHP Reference](https://www.php.net/manual/en/class.attribute.php)

## Attribute with argument

*Example: Attribute with argument*

```php
<?php

#[Attribute]
class SomeFunctionAttribute
{
    public function __construct(public string $info) {}
}

#[SomeFunctionAttribute('Some attribute.')]
function someFunction()
{
}

$someReflection = new ReflectionFunction('someFunction');

$someAttributes = $someReflection->getAttributes(SomeFunctionAttribute::class);

foreach ($someAttributes as $attribute) {
    $someFunctionAttributeObject = $attribute->newInstance();
    print($someFunctionAttributeObject->info . PHP_EOL);
}

```

**Result (PHP 8.4)**:

```
Some attribute.
```

**Source code**:
[Example](../../../examples/code/attributes/attribute_with_argument.php)

## Repeatable attribute

*Example: Repeatable attribute*

```php
<?php

#[Attribute]
class SomeFunctionAttribute
{
    public function __construct(public string $info) {}
}

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_FUNCTION)]
class OtherFunctionAttribute extends SomeFunctionAttribute
{
}

#[SomeFunctionAttribute('Some attribute.')]
#[OtherFunctionAttribute('Other attribute 1.')]
#[
    OtherFunctionAttribute('Other attribute 2.'),
    OtherFunctionAttribute('Other attribute 3.')
]
function someFunction()
{
}

$someReflection = new ReflectionFunction('someFunction');

$someAttributes = $someReflection->getAttributes(SomeFunctionAttribute::class);

foreach ($someAttributes as $attribute) {
    $someFunctionAttributeObject = $attribute->newInstance();
    print($someFunctionAttributeObject->info . PHP_EOL);
}

$otherAttributes = $someReflection->getAttributes(OtherFunctionAttribute::class);

foreach ($otherAttributes as $attribute) {
    $otherFunctionAttributeObject = $attribute->newInstance();
    print($otherFunctionAttributeObject->info . PHP_EOL);
}

```

**Result (PHP 8.4)**:

```
Some attribute.
Other attribute 1.
Other attribute 2.
Other attribute 3.
```

**Source code**:
[Example](../../../examples/code/attributes/repeatable_attribute.php)

## Reading attributes with the reflection API

To access *attributes* from *classes*, *methods*, *functions*, *parameters*, *properties*, and *class constants*, use the `getAttributes()` *method* provided by the *reflection API*. This *method* returns an *array* of `ReflectionAttribute` *instances*. These *instances* can be queried for the *attribute name*, *arguments*, and can be used to instantiate an *instance* of the represented *attribute*.

Separating the *reflected attribute representation* from its actual *instance* provides more control over error handling, such as missing *attribute classes*, mistyped *arguments*, or missing values. *Objects* of the *attribute class* are instantiated only after calling `ReflectionAttribute::newInstance()`, ensuring that *argument validation* occurs at that point.

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.reflection.php)

### `ReflectionAttribute` class

**Description**

The ReflectionAttribute class provides information about an Attribute.

**Synopsis**

```php
class ReflectionAttribute implements Reflector
{
    /* Constants */
    public const int IS_INSTANCEOF;
    /* Properties */
    public string $name;
    /* Methods */
    private __construct()
    public getArguments(): array
    public getName(): string
    public getTarget(): int
    public isRepeated(): bool
    public newInstance(): object
}
```

**Properties**

* `name`
    - The name of the attribute.

**Predefined constants**

***`ReflectionAttribute` flags ***

* `ReflectionAttribute::IS_INSTANCEOF int`
    - Retrieve attributes using an instanceof check.

Note:

The values of these constants may change between PHP versions. It is recommended to always use the constants and not rely on the values directly.

-- [PHP Reference](https://www.php.net/manual/en/class.reflectionattribute.php)

*Example: Reading attributes using reflection API*

```php
<?php

#[Attribute]
class MyAttribute
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

#[MyAttribute(value: 1234)]
class Thing
{
}

function dumpAttributeData($reflection) {
    $attributes = $reflection->getAttributes();

    foreach ($attributes as $attribute) {
       var_dump($attribute->getName());
       var_dump($attribute->getArguments());
       var_dump($attribute->newInstance());
    }
}

dumpAttributeData(new ReflectionClass(Thing::class));
/*
string(11) "MyAttribute"
array(1) {
  ["value"]=>
  int(1234)
}
object(MyAttribute)#3 (1) {
  ["value"]=>
  int(1234)
}
*/
```

Instead of iterating over all *attributes* on the *reflection instance*, you can retrieve only those of a specific *attribute class* by passing the *attribute class name* as an *argument*.

*Example: Reading specific attributes using reflection API*

```php
<?php

function dumpMyAttributeData($reflection) {
    $attributes = $reflection->getAttributes(MyAttribute::class);

    foreach ($attributes as $attribute) {
       var_dump($attribute->getName());
       var_dump($attribute->getArguments());
       var_dump($attribute->newInstance());
    }
}

dumpMyAttributeData(new ReflectionClass(Thing::class));
```

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.reflection.php)

## Attribute usage

*Attributes* can complement or replace optional *interface methods* by providing *metadata* instead of enforced structure. Consider an `ActionHandler` *interface* that represents an operation in an application. Some *implementations* may require a setup step while others do not. Instead of forcing all *classes* *implementing* `ActionHandler` to define a `setUp()` *method*, an *attribute* can indicate setup requirements. This approach increases flexibility, allowing *attributes* to be applied multiple times when necessary.

*Example: Implementing optional methods of an interface with attributes*

```php
<?php
interface ActionHandler
{
    public function execute();
}

#[Attribute]
class SetUp {}

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    #[SetUp]
    public function fileExists()
    {
        if (!file_exists($this->fileName)) {
            throw new RuntimeException("File does not exist");
        }
    }

    #[SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this->targetDirectory)) {
            mkdir($this->targetDirectory);
        } elseif (!is_dir($this->targetDirectory)) {
            throw new RuntimeException("Target directory $this->targetDirectory is not a directory");
        }
    }

    public function execute()
    {
        copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
    }
}

function executeAction(ActionHandler $actionHandler)
{
    $reflection = new ReflectionObject($actionHandler);

    foreach ($reflection->getMethods() as $method) {
        $attributes = $method->getAttributes(SetUp::class);

        if (count($attributes) > 0) {
            $methodName = $method->getName();

            $actionHandler->$methodName();
        }
    }

    $actionHandler->execute();
}

$copyAction = new CopyFile();
$copyAction->fileName = "/tmp/foo.jpg";
$copyAction->targetDirectory = "/home/user";

executeAction($copyAction);
```

-- [PHP Reference](https://www.php.net/manual/en/language.attributes.overview.php#language.attributes.overview)

[▵ Up](#attributes)
[⌂ Home](../../../README.md)
[▲ Previous: Exceptions](../errors_and_exceptions/exceptions/exceptions.md)
[▼ Next: Reflections](../reflections/reflections.md)
