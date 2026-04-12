# Variable dereferencing

## In general

**Variable dereferencing** is the process of *accessing* or *modifying* data stored at a specific *memory location*, which is held by a *pointer variable*. By using the *dereference operator* (`*` in *C*/*C++*), the program retrieves the *actual value* instead of the *memory address*. It is critical for *linked list traversal*, *passing by address*, and *dynamic memory management*.

### Key aspects of variable dereferencing

* The *dereference operator* (`*`): This *unary operator* is placed in front of a *pointer variable* to access the value at the address it holds.
* *Pointer vs. Value*: A *pointer* holds a *memory address* (`0x7ffe`...), while *dereferencing* allows access to the data stored at that address (e.g., `10`).

### Common use cases

* *Direct Modification*: Altering the data at the referenced memory location.
* *Data Structure Manipulation*: Essential for working with *linked lists*, *trees*, and other *dynamic data structures*.
* *Passing Arguments*: Allowing functions to modify variables in the calling function (pass-by-reference).
* *Risks*: Dereferencing a `NULL` or uninitialized pointer can cause serious errors, such as *runtime exceptions* or *segmentation faults*.

### Examples in C/C++

```C++
int a = 10;
int* ptr = &a; // ptr now holds the address of 'a'
int value = *ptr; // Dereferencing: value is now 10
*ptr = 20; // Dereferencing to modify: 'a' is now 20
```

### Other Contexts

* *Bash Scripting*: Uses indirect expansion `${!var}` to interpret the value of a variable as the name of another variable.
* *Other Languages*: In languages like *C#* or *Java*, this concept often manifests as handling references, where dereferencing null throws a `NullReferenceException`.

-- [Gemini LLM](https://share.google/aimode/TRT1OqSmeEd4WpFzH)

## In PHP 7

PHP 7 introduced *uniform variable syntax*, making *dereferencing* more consistent by *evaluating operations strictly left-to-right* and allowing arbitrary nesting of operators like `->` (object property), `[]`/`{}` (array/offset), `()` (function call), and `::` (static property/method) on any valid left-side expression. This fixed PHP 5's inconsistent parsing, where some chains had special right-to-left rules, potentially causing breakage (use `{}` braces to restore old behavior if needed). It enables cleaner, more flexible code like function returns or array literals being immediately dereferenced.

## Key Improvements

- **Left-to-right evaluation**: Expressions like `$foo->$bar['baz']()` now parse as `($foo->$bar)['baz']()`, not the PHP 5 mixed order. [wiki.php](https://wiki.php.net/rfc/uniform_variable_syntax)
- **Arbitrary nesting**: Chains like `$foo['bar']->baz()::$rab` work reliably, grouped left-to-right. [wiki.php](https://wiki.php.net/rfc/uniform_variable_syntax)

## PHP 5 vs PHP 7 Example

In PHP 5, `$$foo['bar']['baz']` might parse inconsistently (right-to-left in parts), risking errors. PHP 7 fixes it to `(($$foo)['bar'])['baz']`. [wiki.php](https://wiki.php.net/rfc/uniform_variable_syntax)

```php
<?php
// PHP 5: Might fail or parse differently due to special cases
$foo = 'bar';
$bar = ['bar' => ['baz' => 'value']];
var_dump($$foo['bar']['baz']);  // Unreliable in PHP 5

// PHP 7: Consistent left-to-right, works everywhere
// Parses as ((($foo)['bar'])['baz']) → $bar['baz'] → 'value'
$foo = 'bar';
$bar = ['bar' => ['baz' => 'value']];
var_dump($$foo['bar']['baz']);  // string(5) "value"

// New PHP 7 syntax: Call result dereferenced
function getArray() { return ['prop' => 'hello']; }
echo getArray()['prop'];  // "hello" (fails in PHP 5)

// Nested example
class Example {
    public function __construct(public $variable = []) {
        $this->variable = ['method' => function() { return 'world'; }];
    }
}
$inst = new Example();
// Be aware that such situation can break the Liskov Substitution Principle (LSP of SOLID)
// if the $inst variable will be an function argument for example.
// Child class can override contruction in the way that will be compatible with parent signature,
// but the child constructor does not have to assign the array with the function to the $variable,
// so $inst variable cannot be substituted with the instance of the Example child class. -- KK
echo $inst->variable['method']();  // "world" (new/reliable in PHP 7)
?>
```

## Potential Breakage

Old code like `$foo->$bar['baz']()` changes meaning; wrap in `{}` for PHP 5 compatibility: `$foo->{$bar['baz']}()`. Low-impact, but test upgrades. [resoundingechoes](https://resoundingechoes.net/development/php-7-left-right-variable-evaluation/)

-- [Perplexity (with fixed code examples)](https://www.perplexity.ai/search/explain-with-the-code-example-yls1FsizQxq.pplDogeudQ#0)
