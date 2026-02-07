[⌂ Home](../../../../README.md)
[▲ Previous: Errors](../../errors_and_exceptions/errors/errors.md)

# Exceptions

PHP has an *exception model* similar to that of other programming languages. An *exception* can be *thrown*, and *caught* ("catched") within PHP. Code may be surrounded in a *`try` block*, to facilitate the catching of potential *exceptions*. Each `try` must have at least one corresponding `catch` or `finally` block.

If an *exception* is thrown and its current *function scope* has no *`catch` block*, the exception will "bubble up" the *call stack* to the calling *function* until it finds a matching *`catch` block*. All *`finally` blocks* it encounters along the way will be executed. If the *call stack* is unwound all the way to the *global scope* without encountering a matching *`catch` block*, the program will terminate with a fatal error unless a *global exception handler* has been set.

The thrown *object* must be an instance of `Throwable`. Trying to throw an *object* that is not will result in a PHP fatal error.

As of PHP 8.0.0, the *`throw` keyword* is an *expression* and may be used in any *expression* context. In prior versions it was a *statement* and was required to be on its own line.

## `catch`

A *`catch` block* defines how to respond to a thrown *exception*. A *`catch` block* defines one or more *types* of *exception* or *error* it can handle, and optionally a *variable* to which to assign the *exception*. (The *variable* was required prior to PHP 8.0.0.) The first *`catch` block* a thrown *exception* or error encounters that matches the *type* of the thrown *object* will handle the *object*.

Multiple *`catch` blocks* can be used to catch different *classes* of *exceptions*. Normal execution (when no *exception* is thrown within the *`try` block*) will continue after that last *`catch` block* defined in sequence. *Exceptions* can be *thrown* (or *re-thrown*) within a *`catch` block*. If not, execution will continue after the *`catch` block* that was triggered.

When an *exception* is thrown, code following the *statement* will not be executed, and PHP will attempt to find the first matching *`catch` block*. If an *exception* is not caught, a PHP fatal error will be issued with an `"Uncaught Exception ..."` message, unless a handler has been defined with `set_exception_handler()`.

As of PHP 7.1.0, a *`catch` block* may specify multiple exceptions using the pipe (`|`) character. This is useful for when different *exceptions* from different class hierarchies are handled the same.

As of PHP 8.0.0, the *variable name* for a caught *exception* is optional. If not specified, the *`catch` block* will still execute but will not have access to the thrown *object*.

## `finally`

A *`finally` block* may also be specified after or instead of *`catch` blocks*. Code within the finally block will always be executed after the `try` and `catch` blocks, regardless of whether an *exception* has been thrown, and before normal execution resumes.

One notable interaction is between the *`finally` block* and a *`return` statement*. If a *`return` statement* is encountered inside either the `try` or the `catch` blocks, the *`finally` block* will still be executed. Moreover, the *`return` statement* is evaluated when encountered, but the result will be returned after the *`finally` block* is executed. Additionally, if the *`finally` block* also contains a *`return` statement*, the value from the *`finally` block* is returned.

Another notable interaction is between an *exception* thrown from within a *`try` block*, and an exception thrown from within a *`finally` block*. If both blocks throw an *exception*, then the *exception* thrown from the *`finally` block* will be the one that is propagated, and the *exception* thrown from the *`try` block* will be used as its previous *exception*.

## Global exception handler

If an *exception* is allowed to bubble up to the *global scope*, it may be caught by a *global exception handler* if set. The `set_exception_handler()` function can set a *function* that will be called in place of a *`catch` block* if no other block is invoked. The effect is essentially the same as if the entire program were wrapped in a *`try`-`catch` block* with that function as the `catch`.

## Notes

Note:

Internal PHP functions mainly use *error reporting*, only modern object-oriented extensions use *exceptions*. However, *errors* can be easily translated to *exceptions* with `ErrorException`. This technique only works with non-fatal *errors*, however.

*Example: Converting error reporting to exceptions*

```php
<?php
function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler');
?>
```

Tip

The *Standard PHP Library (SPL)* provides a good number of built-in *exceptions*.

## Examples

*Example: Throwing an exception*

```php
<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Continue execution
echo "Hello World\n";
?>
```

The above example will output:

```
0.2
Caught exception: Division by zero.
Hello World
```

*Example: Exception handling with a `finally` block*

```php
<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "First finally.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Second finally.\n";
}

// Continue execution
echo "Hello World\n";
?>
```

The above example will output:

```
0.2
First finally.
Caught exception: Division by zero.
Second finally.
Hello World
```

*Example: Interaction between the `finally` block and `return`*

```php
<?php

function test() {
    try {
        throw new Exception('foo');
    } catch (Exception $e) {
        return 'catch';
    } finally {
        return 'finally';
    }
}

echo test();
?>
```

The above example will output:

```
finally
```

*Example: Nested exception*

```php
<?php

class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();

?>
```

The above example will output:

```
string(4) "foo!"
```

*Example: Multi `catch` exception handling*

```php
<?php

class MyException extends Exception { }

class MyOtherException extends Exception { }

class Test {
    public function testing() {
        try {
            throw new MyException();
        } catch (MyException | MyOtherException $e) {
            var_dump(get_class($e));
        }
    }
}

$foo = new Test;
$foo->testing();

?>
```

The above example will output:

```
string(11) "MyException"
```

*Example: Omitting the caught variable*

Only permitted in PHP 8.0.0 and later.

```php
<?php

class SpecificException extends Exception {}

function test() {
    throw new SpecificException('Oopsie');
}

try {
    test();
} catch (SpecificException) {
    print "A SpecificException was thrown, but we don't care about the details.";
}
?>
```

The above example will output:

```
A SpecificException was thrown, but we don't care about the details.
```

*Example: Throw as an expression*

Only permitted in PHP 8.0.0 and later.

```php
<?php

function test() {
    do_something_risky() or throw new Exception('It did not work');
}

function do_something_risky() {
    return false; // Simulate failure
}

try {
    test();
} catch (Exception $e) {
    print $e->getMessage();
}
?>
```

The above example will output:

```
It did not work
```

*Example: Exception in `try` and in `finally`*

```php
<?php

try {
    try {
        throw new Exception(message: 'Third', previous: new Exception('Fourth'));
    } finally {
        throw new Exception(message: 'First', previous: new Exception('Second'));
    }
} catch (Exception $e) {
    var_dump(
        $e->getMessage(),
        $e->getPrevious()->getMessage(),
        $e->getPrevious()->getPrevious()->getMessage(),
        $e->getPrevious()->getPrevious()->getPrevious()->getMessage(),
    );
}
```

The above example will output:

```
string(5) "First"
string(6) "Second"
string(5) "Third"
string(6) "Fourth"
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php)

## Extending exceptions

A user-defined *exception class* can be *defined* by *extending* the built-in `Exception` *class*. The *members* and *properties* below, show what is accessible within the *child class* that derives from the built-in `Exception` *class*.

*Example: The built-in `Exception` class*

```php
<?php
class Exception implements Throwable
{
    protected $message = 'Unknown exception';   // exception message
    private   $string;                          // __toString cache
    protected $code = 0;                        // user defined exception code
    protected $file;                            // source filename of exception
    protected $line;                            // source line of exception
    private   $trace;                           // backtrace
    private   $previous;                        // previous exception if nested exception

    public function __construct($message = '', $code = 0, ?Throwable $previous = null);

    final private function __clone();           // Inhibits cloning of exceptions.

    final public  function getMessage();        // message of exception
    final public  function getCode();           // code of exception
    final public  function getFile();           // source filename
    final public  function getLine();           // source line
    final public  function getTrace();          // an array of the backtrace()
    final public  function getPrevious();       // previous exception
    final public  function getTraceAsString();  // formatted string of trace

    // Overrideable
    public function __toString();               // formatted string for display
}
?>
```

If a *class* *extends* the built-in *exception class* and re-defines the *constructor*, it is highly recommended that it also call `parent::__construct()` to ensure all available data has been properly assigned. The `__toString()` method can be *overridden* to provide a custom output when the *object* is presented as a *string*.

Note:

*Exceptions* cannot be *cloned*. Attempting to *clone* an `Exception` will result in a fatal `E_ERROR` error.

*Example: Extending the `Exception` class*

```php
<?php
/**
 * Define a custom exception class
 */
class MyException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, ?Throwable $previous = null) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}


/**
 * Create a class to test the exception
 */
class TestException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // throw custom exception
                throw new MyException('1 is an invalid parameter', 5);
                break;

            case self::THROW_DEFAULT:
                // throw default one.
                throw new Exception('2 is not allowed as a parameter', 6);
                break;

            default:
                // No exception, object will be created.
                $this->var = $avalue;
                break;
        }
    }
}


// Example 1
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) {      // Will be caught
    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) {        // Skipped
    echo "Caught Default Exception\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 2
try {
    $o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) {      // Doesn't match this type
    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) {        // Will be caught
    echo "Caught Default Exception\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 3
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) {        // Will be caught
    echo "Default Exception caught\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 4
try {
    $o = new TestException();
} catch (Exception $e) {        // Skipped, no exception
    echo "Default Exception caught\n", $e;
}

// Continue execution
var_dump($o); // TestException
echo "\n\n";
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.extending.php)

[▵ Up](#exceptions)
[⌂ Home](../../../../README.md)
[▲ Previous: Errors](../../errors_and_exceptions/errors/errors.md)
