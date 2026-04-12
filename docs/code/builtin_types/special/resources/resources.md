[⌂ Home](../../../../../README.md)
[▲ Previous: Null](../../special/null/null.md)
[▼ Next: Booleans](../../scalar/booleans/booleans.md)

# Resources

## Description

A ***resource*** is a *special variable*, holding a *reference* to an *external resource*. *Resources* are created and used by *special functions*.

See also the `get_resource_type()` *function*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.resource.php)

*Example: `resource` type*

```php
<?php

$filePath = __DIR__ . DIRECTORY_SEPARATOR . 'file.txt';
$someFile = fopen($filePath, 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");

$content = fread($someFile, filesize($filePath));
print("Content: {$content}\n");

fclose($someFile);

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");

```

**Result (PHP 8.4)**:

```
Information:
resource(5) of type (stream)
Type: resource
As string: Resource id #5

Content: Some content.

Information:
resource(5) of type (Unknown)
Type: resource (closed)
As string: Resource id #5

```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/resource/resource.php)

## Usage

A *resource* is a special *variable* that references to an external resource such as:

* a *file*
* a *database connection*
* a *network connection*

A *resource* is not actual data like a *string* or *number*. Instead, it’s a *reference* to something outside of PHP. PHP uses *resources* to manage things outside of PHP efficiently by automatically free it when it is no longer in use.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-data-types/#resource)

## Converting to `resource`

As *resource variables* hold *special handles* to *opened files*, *database connections*, *image canvas areas* and the like, converting to a *resource* makes no sense.

## Freeing resources

Thanks to the reference-counting system being part of Zend Engine, a *resource* with no more *references* to it is detected automatically, and it is freed by the *garbage collector*. For this reason, it is rarely necessary to free the memory manually.

Note: *Persistent database links* are an exception to this rule. They are not destroyed by the *garbage collector*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.resource.php)

## Resource type

```php
<?php

$someFile = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'file.txt', 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print('Type: ' . get_resource_id($someFile) . PHP_EOL);
print('Type: ' . get_resource_type($someFile) . PHP_EOL);

fclose($someFile);

```

**Result (PHP 8.4)**:

```
Type: 5
Type: stream
```

**Source code**:
[Example](../../../../../example/code/builtin_types/special/resource/checking_resource_type.php)

[▵ Up](#resources)
[⌂ Home](../../../../../README.md)
[▲ Previous: Null](../../special/null/null.md)
[▼ Next: Booleans](../../scalar/booleans/booleans.md)
