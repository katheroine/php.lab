[⌂ Home](../../../../../README.md)
[▲ Previous: Floating point](../floating_point/floating_point.md)
[▼ Next: Arrays](../../compound/arrays/arrays.md)

# Strings

## Description

A **string** is a *series of characters*, where a *character* is the same as a *byte*. This means that PHP only supports a *256-character set*, and hence does not offer native *Unicode* support.

Note: On 32-bit builds, a `string` can be as large as up to 2GB (2147483647 bytes maximum)

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

In PHP, a *string* is a sequence of characters.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-string/#introduction-to-php-strings)

*Example: `string` type*

```php
<?php

$someText = 'Hi, there!';
$otherText = "Hello.";

print("Information:\n");
var_dump($someText);
print('Type: ' . gettype($someText) . PHP_EOL);

print("Information:\n");
var_dump($otherText);
print('Type: ' . gettype($otherText) . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Information:
string(10) "Hi, there!"
Type: string
Information:
string(6) "Hello."
Type: string
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string.php)

## Syntax

A `string` literal can be specified in four different ways:

* single quoted
* double quoted
* heredoc syntax
* nowdoc syntax

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

PHP provides four ways to define a literal string: *single-quoted*, *double-quoted*, *heredoc syntax*, and *nowdoc syntax*.

To define a string, you wrap the text within single quotes like this:

```php
<?php

$title = 'PHP string is awesome';
```

Or you can use double quotes:

```
<?php

$title = "PHP string is awesome";
```

However, you cannot start a string with a single quote and end it with a double quote and vice versa. The quotes must be consistent.

-- [PHP Tutorial](https://www.phptutorial.net/php-tutorial/php-string/#introduction-to-php-strings)

### Single quoted

The simplest way to specify a `string` is to enclose it in single quotes (the character `'`).

To specify a *literal single quote*, escape it with a backslash (`\'`). To specify a literal backslash, double it (`\\`). All other instances of backslash will be treated as a literal backslash: this means that the other *escape sequences* you might be used to, such as `\r` or `\n`, will be output literally as specified rather than having any special meaning.

Note: Unlike the *double-quoted* and *heredoc* syntaxes, *variables* and *escape sequences* for special characters will not be expanded when they occur in single quoted strings.

*Example: Syntax variants*

```php
<?php
echo 'this is a simple string', PHP_EOL;

echo 'You can also have embedded newlines in
strings this way as it is
okay to do', PHP_EOL;

// Outputs: Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"', PHP_EOL;

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\\*.*?', PHP_EOL;

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\*.*?', PHP_EOL;

// Outputs: This will not expand: \n a newline
echo 'This will not expand: \n a newline', PHP_EOL;

// Outputs: Variables do not $expand $either
echo 'Variables do not $expand $either', PHP_EOL;
?>
```

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

### Double quoted

If the string is enclosed in double-quotes (`"`), PHP will interpret the following escape sequences for special characters:

**Escaped characters**
| Sequence | Meaning |
|----------|---------|
| `\n` | linefeed (`LF` or `0x0A` (`10`) in ASCII) |
| `\r` | carriage return (`CR` or `0x0D` (`13`) in ASCII) |
| `\t` | horizontal tab (`HT` or `0x09` (`9`) in ASCII) |
| `\v` | vertical tab (`VT` or `0x0B` (`11`) in ASCII) |
| `\e` | escape (`ESC` or `0x1B` (`27`) in ASCII) |
| `\f` | form feed (`FF` or `0x0C` (`12`) in ASCII) |
| `\\` | backslash |
| `\$` | dollar sign |
| `\"` | double-quote |
| `\[0-7]{1,3}` | *Octal*: the sequence of characters matching the regular expression `[0-7]{1,3}` is a character in octal notation (e.g. `"\101" === "A"`), which silently overflows to fit in a byte (e.g. `"\400" === "\000"`) |
| `\x[0-9A-Fa-f]{1,2}` | *Hexadecimal*: the sequence of characters matching the regular expression `[0-9A-Fa-f]{1,2}` is a character in hexadecimal notation (e.g. `"\x41" === "A"`) |
| `\u{[0-9A-Fa-f]+}` | *Unicode*: the sequence of characters matching the regular expression `[0-9A-Fa-f]+` is a Unicode codepoint, which will be output to the string as that codepoint's *UTF-8* representation. The braces are required in the sequence. E.g. `"\u{41}" === "A"` |

As in single quoted strings, escaping any other character will result in the backslash being printed too.

The most important feature of double-quoted strings is the fact that variable names will be expanded.

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

### Heredoc

A third way to delimit strings is the *heredoc syntax*: `<<<`. After this operator, an identifier is provided, then a newline. The string itself follows, and then the same identifier again to close the quotation.

The closing identifier may be indented by space or tab, in which case the indentation will be stripped from all lines in the *doc string*. Prior to PHP 7.3.0, the closing identifier must begin in the first column of the line.

Also, the closing identifier must follow the same naming rules as any other *label* in PHP: it must contain only alphanumeric characters and underscores, and must start with a non-digit character or underscore.

*Example: Basic Heredoc example as of PHP 7.3.0*

```php
<?php
// no indentation
echo <<<END
      a
     b
    c
\n
END;

// 4 spaces of indentation
echo <<<END
      a
     b
    c
    END;
```

Output of the above example in PHP 7.3:

```
      a
     b
    c

  a
 b
c
```

If the closing identifier is indented further than any lines of the body, then a `ParseError` will be thrown:

*Example: Closing identifier must not be indented further than any lines of the body*

```php
<?php
echo <<<END
  a
 b
c
   END;
```

Output of the above example in PHP 7.3:

```
Parse error: Invalid body indentation level (expecting an indentation level of at least 3) in example.php on line 4
```

If the closing identifier is indented, tabs can be used as well, however, tabs and spaces must not be intermixed regarding the indentation of the closing identifier and the indentation of the body (up to the closing identifier). In any of these cases, a `ParseError` will be thrown. These whitespace constraints have been included because mixing tabs and spaces for indentation is harmful to legibility.

*Example: Different indentation for body (spaces) closing identifier*

```php
<?php
// All the following code do not work.

// different indentation for body (spaces) ending marker (tabs)
{
    echo <<<END
     a
        END;
}

// mixing spaces and tabs in body
{
    echo <<<END
        a
     END;
}

// mixing spaces and tabs in ending marker
{
    echo <<<END
          a
         END;
}
```

Output of the above example in PHP 7.3:

```
Parse error: Invalid indentation - tabs and spaces cannot be mixed in example.php line 8
```

The closing identifier for the body string is not required to be followed by a semicolon or newline. For example, the following code is allowed as of PHP 7.3.0:

*Example: Continuing an expression after a closing identifier*

```php
<?php
$values = [<<<END
a
  b
    c
END, 'd e f'];
var_dump($values);
```

Output of the above example in PHP 7.3:

```
array(2) {
  [0] =>
  string(11) "a
  b
    c"
  [1] =>
  string(5) "d e f"
}
```

Warning

If the closing identifier was found at the start of a line, then regardless of whether it was a part of another word, it may be considered as the closing identifier and causes a `ParseError`.

*Example: Closing identifier in body of the string tends to cause ParseError*

```php
<?php
$values = [<<<END
a
b
END ING
END, 'd e f'];
```

Output of the above example in PHP 7.3:

```
Parse error: syntax error, unexpected identifier "ING", expecting "]" in example.php on line 5
```

To avoid this problem, it is safe to follow the simple rule: do not choose a word that appears in the body of the text as a closing identifier.

Warning

Prior to PHP 7.3.0, it is very important to note that the line with the closing identifier must contain no other characters, except a semicolon (`;`). That means especially that the identifier may not be indented, and there may not be any spaces or tabs before or after the semicolon. It's also important to realize that the first character before the closing identifier must be a newline as defined by the local operating system. This is `\n` on UNIX systems, including macOS. The closing delimiter must also be followed by a newline.

If this rule is broken and the closing identifier is not "clean", it will not be considered a closing identifier, and PHP will continue looking for one. If a proper closing identifier is not found before the end of the current file, a parse error will result at the last line.

*Example: Invalid example, prior to PHP 7.3.0*

```php
<?php
class foo {
    public $bar = <<<EOT
bar
    EOT;
}
// Identifier must not be indented
?>
```

*Example: Valid example, even prior to PHP 7.3.0*

```php
<?php
class foo {
    public $bar = <<<EOT
bar
EOT;
}
?>
```

*Heredocs* containing variables can not be used for initializing class properties.

*Heredoc text* behaves just like a *double-quoted string*, without the double quotes. This means that quotes in a *heredoc* do not need to be escaped, but the escape codes listed above can still be used. *Variables* are expanded, but the same care must be taken when expressing complex variables inside a heredoc as with strings.

*Example: Heredoc string quoting example*

```php
<?php
$str = <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;

/* More complex example, with variables. */
class foo
{
    var $foo;
    var $bar;

    function __construct()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<EOT
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A': \x41
EOT;
?>
```

The above example will output:

```
My name is "MyName". I am printing some Foo.
Now, I am printing some Bar2.
This should print a capital 'A': A
```

It is also possible to use the heredoc syntax to pass data to function arguments:

*Example: Heredoc in arguments example*

```php
<?php
var_dump(array(<<<EOD
foobar!
EOD
));
?>
```

It's possible to initialize *static variables* and class *properties/constants* using the heredoc syntax:

*Example: Using heredoc to initialize static values*

```php
<?php
// Static variables
function foo()
{
    static $bar = <<<LABEL
Nothing in here...
LABEL;
}

// Class properties/constants
class foo
{
    const BAR = <<<FOOBAR
Constant example
FOOBAR;

    public $baz = <<<FOOBAR
Property example
FOOBAR;
}
?>
```

The opening heredoc identifier may optionally be enclosed in double quotes:

*Example: Using double quotes in heredoc*

```php
<?php
echo <<<"FOOBAR"
Hello World!
FOOBAR;
?>
```

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

### Nowdoc

*Nowdocs* are to *single-quoted strings* what *heredocs* are to *double-quoted strings*. A no*wdoc is specified similarly to a *heredoc*, but no *string interpolation* is done inside a *nowdoc*. The construct is ideal for embedding PHP code or other large blocks of text without the need for escaping. It shares some features in common with the *SGML* `<![CDATA[ ]]>` construct, in that it declares a *block of text which is not for parsing*.

A *nowdoc* is identified with the same `<<<` sequence used for *heredocs*, but the identifier which follows is enclosed in single quotes, e.g. `<<<'EOT'`. All the rules for *heredoc identifiers* also apply to *nowdoc identifiers*, especially those regarding the appearance of the closing identifier.

*Example: Nowdoc string quoting example*

```php
<?php
echo <<<'EOD'
Example of string spanning multiple lines
using nowdoc syntax. Backslashes are always treated literally,
e.g. \\ and \'.
EOD;
```

The above example will output:

```
Example of string spanning multiple lines
using nowdoc syntax. Backslashes are always treated literally,
e.g. \\ and \'.
```

*Example: Nowdoc string quoting example with variables*

```php
<?php
class foo
{
    public $foo;
    public $bar;

    function __construct()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<'EOT'
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
EOT;
?>
```

The above example will output:

```
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
```

*Example: Static data example*

```php
<?php
class foo {
    public $bar = <<<'EOT'
bar
EOT;
}
?>
```

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

*Example: `string` syntax*

```php
<?php

$someTextSingleQuoted = 'Videmus nunc per speculum et in aenigmate.';
$someTextDoubleQuoted = "Omnis mundi creatura,\nquasi liber et pictura,\nnobis est in speculum.";
$someTextNowdoc = <<<'EndOfDictum'
    Actus me invito factus
    non est meus actus
EndOfDictum;
$someTextHereDoc = <<<EndOfLyrics
Foulës in the frith,
The fishës in the flod,
And I mon waxë wod;\n
Much sorwe I walkë with
For beste of bon and blod.
EndOfLyrics;

print($someTextSingleQuoted);
print(PHP_EOL . PHP_EOL);
print($someTextDoubleQuoted);
print(PHP_EOL . PHP_EOL);
print($someTextNowdoc);
print(PHP_EOL . PHP_EOL);
print($someTextHereDoc);
print(PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Videmus nunc per speculum et in aenigmate.

Omnis mundi creatura,
quasi liber et pictura,
nobis est in speculum.

    Actus me invito factus
    non est meus actus

Foulës in the frith,
The fishës in the flod,
And I mon waxë wod;

Much sorwe I walkë with
For beste of bon and blod.

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_syntax.php)

## Usage

*Example: Text processing use case*

```php
<?php

$input = "  Hello, World!  ";
$clean = trim($input);
$upper = strtoupper($clean);
$replaced = str_replace("WORLD", "PHP", $upper);

print($replaced . PHP_EOL);

```

**Result (PHP 8.4)**:

```
HELLO, PHP!
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/use_cases/string_use_case_text_processing.php)

*Example: Text statistics use case*

```php
<?php

$text = "Omnis mundi creatura\n
quasi liber et pictura\n
nobis est in speculum:\n
nostrae vitae, nostrae mortis,\n
nostri status, nostrae sortis\n
fidele signaculum.\n";

$charactersNumber = strlen($text);
$wordsNumber = str_word_count($text);
$sentencesNumber = substr_count($text, '.') + substr_count($text, '!') + substr_count($text, '?');

printf("Length: %d, Words: %d, Sentences: %d\n", $charactersNumber, $wordsNumber, $sentencesNumber);

$words = str_word_count($text, 1); // array of words
$uniqueWordsNumber = count(array_unique($words));

printf("Unique words: %d\n", $uniqueWordsNumber);

$vowelsNumber = strlen(preg_replace('/[^aeiouAEIOU]/', '', $text));
$consonantsNumber = strlen(preg_replace('/[aeiouAEIOU\s]/', '', $text));
$spacesNumber = substr_count($text, ' ');
printf("Vowels: %d, Consonants: %d, Spaces: %d\n", $vowelsNumber, $consonantsNumber, $spacesNumber);

```

**Result (PHP 8.4)**:

```
Length: 152, Words: 21, Sentences: 1
Unique words: 19
Vowels: 51, Consonants: 75, Spaces: 15
```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/use_cases/string_use_case_text_statistics.php)

## Testing for `string`

*Example: Testing for `string`*

```php
<?php

$someText = 'rabbit';

print('Type of text: ' . gettype($someText) . PHP_EOL);
print('Is string? ' . (is_string($someText) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is string? ' . (is_string($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Type of text: string
Is string? yes

Type of number: integer
Is string? no

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/testing_for_string.php)

## String interpolation

When a `string` is specified in *double quotes* or with *heredoc*, variables can be substituted within it.

There are two types of syntax: a *basic one* and an *advanced one*. The *basic syntax* is the most common and convenient. It provides a way to embed a *variable*, an *array value*, or an *object property* in a `string` with a minimum of effort.

### Basic syntax

If a dollar sign (`$`) is encountered, the characters that follow it which can be used in a variable name will be interpreted as such and substituted.

*Example: String interpolation*

```php
<?php
$juice = "apple";

echo "He drank some $juice juice." . PHP_EOL;

?>
```

The above example will output:

```
He drank some apple juice.
```

Formally, the structure for the basic variable substitution syntax is as follows:

```
string-variable::
     variable-name   (offset-or-property)?
   | ${   expression   }

offset-or-property::
     offset-in-string
   | property-in-string

offset-in-string::
     [   name   ]
   | [   variable-name   ]
   | [   integer-literal   ]

property-in-string::
     ->  name

variable-name::
     $   name

name::
     [a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*
```

Warning

The `${ expression }` syntax is deprecated as of PHP 8.2.0, as it can be interpreted as variable variables:

```php
<?php
const foo = 'bar';
$foo = 'foo';
$bar = 'bar';
var_dump("${foo}");
var_dump("${(foo)}");
?>
```

Output of the above example in PHP 8.2:

```
Deprecated: Using ${var} in strings is deprecated, use {$var} instead in file on line 6

Deprecated: Using ${expr} (variable variables) in strings is deprecated, use {${expr}} instead in file on line 9
string(3) "foo"
string(3) "bar"
```

[Where in this snippet is the line 9? -- KK]

The above example will output:

```
string(3) "foo"
string(3) "bar"
```

The *advanced string interpolation* syntax should be used instead.

Note: If it is not possible to form a valid name the dollar sign remains as verbatim in the string:

```php
<?php
echo "No interpolation $  has happened\n";
echo "No interpolation $\n has happened\n";
echo "No interpolation $2 has happened\n";
?>
```

The above example will output:

```
No interpolation $  has happened
No interpolation $
 has happened
No interpolation $2 has happened
```

Example: Interpolating the value of the first dimension of an array or property

```php
<?php
$juices = array("apple", "orange", "string_key" => "purple");

echo "He drank some $juices[0] juice.";
echo PHP_EOL;
echo "He drank some $juices[1] juice.";
echo PHP_EOL;
echo "He drank some $juices[string_key] juice.";
echo PHP_EOL;

class A {
    public $s = "string";
}

$o = new A();

echo "Object value: $o->s.";
?>
```

The above example will output:

```
He drank some apple juice.
He drank some orange juice.
He drank some purple juice.
Object value: string.
```

Note: The array key must be unquoted, and it is therefore not possible to refer to a constant as a key with the basic syntax. Use the advanced syntax instead.

As of PHP 7.1.0 also negative numeric indices are supported.

*Example: Negative numeric indices*

```php
<?php
$string = 'string';
echo "The character at index -2 is $string[-2].", PHP_EOL;
$string[-3] = 'o';
echo "Changing the character at index -3 to o gives $string.", PHP_EOL;
?>
```

The above example will output:

```
The character at index -2 is n.
Changing the character at index -3 to o gives strong.
```

For anything more complex, the *advanced syntax* must be used.

### Advanced (curly) syntax

The *advanced syntax* permits the interpolation of variables with arbitrary accessors.

Any scalar variable, array element or object property (static or not) with a string representation can be included via this syntax. The expression is written the same way as it would appear outside the string, and then wrapped in `{` and `}`. Since `{` can not be escaped, this syntax will only be recognised when the `$` immediately follows the `{`. Use `{\$` to get a literal `{$`. Some examples to make it clear:

*Example: Curly syntax*

```php
<?php
const DATA_KEY = 'const-key';
$great = 'fantastic';
$arr = [
    '1',
    '2',
    '3',
    [41, 42, 43],
    'key' => 'Indexed value',
    'const-key' => 'Key with minus sign',
    'foo' => ['foo1', 'foo2', 'foo3']
];

// Won't work, outputs: This is { fantastic}
echo "This is { $great}";

// Works, outputs: This is fantastic
echo "This is {$great}";

class Square {
    public $width;

    public function __construct(int $width) { $this->width = $width; }
}

$square = new Square(5);

// Works
echo "This square is {$square->width}00 centimeters wide.";


// Works, quoted keys only work using the curly brace syntax
echo "This works: {$arr['key']}";


// Works
echo "This works: {$arr[3][2]}";

echo "This works: {$arr[DATA_KEY]}";

// When using multidimensional arrays, always use braces around arrays
// when inside of strings
echo "This works: {$arr['foo'][2]}";

echo "This works: {$obj->values[3]->name}";

echo "This works: {$obj->$staticProp}";

// Won't work, outputs: C:\directory\{fantastic}.txt
echo "C:\directory\{$great}.txt";

// Works, outputs: C:\directory\fantastic.txt
echo "C:\\directory\\{$great}.txt";
?>
```

Note: As this syntax allows arbitrary expressions it is possible to use *variable variables* within the advanced syntax.

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

*Example: String interpolation*

```php
<?php

$someNumber = 1; $someValue = 2.3; $someText = 'apple';

// Wanrning!
// Placing interpolated variables inside strings without {} is not recommended.
// Using ${variable} instead of {$variable} is deprecated.
// Quoted keys cannot be parsed.

print("Some number: $someNumber\nSome value: {$someValue}\nSome text: ${someText}\n\n");

$someArray = [
  'orange',
  'blue',
  'green',
];

print("First array element: $someArray[0]\nSecond array element: {$someArray[1]}\nThird array element: ${someArray[2]}\n\n");

$otherArray = [
  'text_0' => "Stat rosa pristina nomine, nomina nuda tenemus.",
  'text_1' => "Omnis mundi creatura quasi liber et pictura nobis est in speculum.",
  'text_2' => "Videmus nunc per speculum et in aenigmate.",
];

// Warning!
// Using associative array keys without quotes is not recommended.
// This syntax is proper but for defined constants.
// But if it is used inside the interpolated string without {} it is proper.

print("First associative array element: $otherArray[text_0]\n");
print("Second associative array element: {$otherArray['text_1']}\n");
print("Third associative array element: ${otherArray['text_2']}\n\n");

$someObject = new class {
  public string $someProperty = "fruit";
  public string $otherProperty = "flower";
  public string $anotherProperty = "animal";
};

print("Some object property: $someObject->someProperty\n");
print("Other object property: {$someObject->otherProperty}\n");
// print("Another object property: ${someObject->anotherProperty}\n");
// PHP Fatal error:  Uncaught Error: Undefined constant "someObject"
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some number: 1
Some value: 2.3
Some text: apple

First array element: orange
Second array element: blue
Third array element: green

First associative array element: Stat rosa pristina nomine, nomina nuda tenemus.
Second associative array element: Omnis mundi creatura quasi liber et pictura nobis est in speculum.
Third associative array element: Videmus nunc per speculum et in aenigmate.

Some object property: fruit
Other object property: flower

```

**Source code**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_interpolation.php)

## String access and modification by character

Characters within strings may be accessed and modified by specifying the *zero-based offset* of the desired character after the string using *square array brackets*, as in `$str[42]`. Think of a string as an *array of characters* for this purpose. The functions `substr()` and `substr_replace()` can be used when you want to extract or replace more than 1 character.

Note: As of PHP 7.1.0, *negative string offsets* are also supported. These specify the offset from the end of the string. Formerly, negative offsets emitted `E_NOTICE` for reading (yielding an empty string) and `E_WARNING` for writing (leaving the string untouched).

Note: Prior to PHP 8.0.0, strings could also be accessed using braces, as in `$str{42}`, for the same purpose. This curly brace syntax was deprecated as of PHP 7.4.0 and no longer supported as of PHP 8.0.0.

Warning

Writing to an out of range offset pads the string with spaces. Non-integer types are converted to integer. Illegal offset type emits `E_WARNING`. Only the first character of an assigned string is used. As of PHP 7.1.0, assigning an empty string throws a fatal error. Formerly, it assigned a `NULL` byte.

Warning

Internally, PHP strings are *byte arrays*. As a result, accessing or modifying a string using array brackets is not multi-byte safe, and should only be done with strings that are in a single-byte encoding such as `ISO-8859-1`.

Note: As of PHP 7.1.0, applying the empty index operator on an empty string throws a fatal error. Formerly, the empty string was silently converted to an array.

*Example: Some string examples*

```php
<?php
// Get the first character of a string
$str = 'This is a test.';
$first = $str[0];
var_dump($first);

// Get the third character of a string
$third = $str[2];
var_dump($third);

// Get the last character of a string.
$str = 'This is still a test.';
$last = $str[strlen($str)-1];
var_dump($last);

// Modify the last character of a string
$str = 'Look at the sea';
$str[strlen($str)-1] = 'e';
var_dump($str);
?>
```

String offsets have to either be integers or integer-like strings, otherwise a warning will be thrown.

*Example: Example of illegal string offsets*

```php
<?php
$str = 'abc';

$keys = [ '1', '1.0', 'x', '1x' ];

foreach ($keys as $keyToTry) {
    var_dump(isset($str[$keyToTry]));

    try {
        var_dump($str[$keyToTry]);
    } catch (TypeError $e) {
        echo $e->getMessage(), PHP_EOL;
    }

    echo PHP_EOL;
}
?>
```

The above example will output:

```
bool(true)
string(1) "b"

bool(false)
Cannot access offset of type string on string

bool(false)
Cannot access offset of type string on string

bool(false)

Warning: Illegal string offset "1x" in Standard input code on line 10
string(1) "b"
```

Note:

Accessing variables of other types (not including arrays or objects implementing the appropriate interfaces) using `[]` or `{}` silently returns `null`.

Note:

Characters within string literals can be accessed using `[]` or `{}`.

Note:

Accessing characters within string literals using the `{}` syntax has been deprecated in PHP 7.4. This has been removed in PHP 8.0.

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

## Useful functions and operators

Strings may be concatenated using the *`.` (dot) operator*. Note that the *`+` (addition) operator* will not work for this.

There are a number of useful functions for string manipulation [...] and the Perl-compatible regular expression functions for advanced find & replace functionality.

There are also functions for *URL strings*, and functions to *encrypt/decrypt* strings (`Sodium` and `Hash`).

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

## Converting to string

A value can be converted to a string using the `(string)` cast or the `strval()` function. *String conversion* is automatically done in the scope of an expression where a string is needed. This happens when using the `echo` or `print` functions, or when a variable is compared to a string.

A `bool` `true` value is converted to the `string` `"1"`. `bool` `false` is converted to `""` (the *empty string*). This allows conversion back and forth between `bool` and `string` values.

An `int` or `float` is converted to a `string` representing the number textually (including the exponent part for floats). Floating point numbers can be converted using exponential notation (`4.1E+6`).

Note:

As of PHP 8.0.0, the decimal point character is always a period (`"."`). Prior to PHP 8.0.0, the decimal point character is defined in the script's *locale* (category `LC_NUMERIC`).

*Arrays* are always converted to the `string` `"Array"`; because of this, `echo` and `print` can not by themselves show the contents of an array. To view a single element, use a construction such as `echo $arr['foo']`.

In order to convert *objects* to `string`, the *magic method* `__toString` must be used.

*Resources* are always converted to strings with the structure `"Resource id #1"`, where `1` is the resource number assigned to the resource by PHP at runtime. While the exact structure of this string should not be relied on and is subject to change, it will always be unique for a given resource within the lifetime of a script being executed (ie a Web request or CLI process) and won't be reused. To get a resource's type, use the `get_resource_type()` function.

`null` is always converted to an *empty string*.

As stated above, directly converting an *array*, *object*, or *resource* to a *string* does not provide any useful information about the value beyond its type. See the functions `print_r()` and `var_dump()` for more effective means of inspecting the contents of these types.

Most PHP values can also be converted to strings for permanent storage. This method is called *serialization*, and is performed by the `serialize()` function.

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

## Details of the `string` type

The `string` in PHP is implemented as *an array of bytes and an integer indicating the length of the buffer*. It has no information about how those *bytes* translate to *characters*, leaving that task to the programmer. There are no limitations on the *values* the string can be composed of; in particular, bytes with value `0` (*NUL bytes*) are allowed anywhere in the `string` (however, a few functions, said in this manual not to be *binary safe*, may hand off the strings to libraries that ignore data after a *NUL byte*.)

This nature of the `string` type explains why there is no separate *byte* type in PHP – strings take this role. Functions that return no textual data – for instance, arbitrary data read from a network socket – will still return strings.

Given that PHP does not dictate a specific encoding for strings, one might wonder how *string literals* are encoded. For instance, is the string `"á"` equivalent to `"\xE1"` (`ISO-8859-1`), `"\xC3\xA1"` (`UTF-8, C form`), `"\x61\xCC\x81"` (`UTF-8, D form`) or any other possible representation? The answer is that string will be encoded in whatever fashion it is encoded in the script file. Thus, if the script is written in `ISO-8859-1`, the string will be encoded in `ISO-8859-1` and so on. However, this does not apply if `Zend Multibyte` is enabled; in that case, the script may be written in an arbitrary encoding (which is explicitly declared or is detected) and then converted to a certain internal encoding, which is then the encoding that will be used for the string literals. Note that there are some constraints on the encoding of the script (or on the internal encoding, should `Zend Multibyte` be enabled) – this almost always means that this encoding should be a compatible superset of `ASCII`, such as `UTF-8` or `ISO-8859-1`. Note, however, that state-dependent encodings where the same byte values can be used in initial and non-initial shift states may be problematic.

Of course, in order to be useful, functions that operate on text may have to make some assumptions about how the string is encoded. Unfortunately, there is much variation on this matter throughout PHP’s functions:

* Some functions assume that the string is encoded in some (any) *single-byte encoding*, but they do not need to interpret those bytes as specific characters. This is case of, for instance, `substr()`, `strpos()`, `strlen()` or `strcmp()`. Another way to think of these functions is that operate on memory buffers, i.e., they work with bytes and byte offsets.
* Other functions are passed the encoding of the string, possibly they also assume a default if no such information is given. This is the case of `htmlentities()` and the majority of the functions in the *`mbstring` extension*.
* Others use the current *locale*, but operate byte-by-byte.
* Finally, they may just assume the string is using a specific encoding, usually `UTF-8`. This is the case of most functions in the *`intl` extension* and in the *`PCRE` extension* (in the last case, only when the `u` modifier is used).

Ultimately, this means writing correct programs using *Unicode* depends on carefully avoiding functions that will not work and that most likely will corrupt the data and using instead the functions that do behave correctly, generally from the `intl` and `mbstring` extensions. However, using functions that can handle *Unicode encodings* is just the beginning. No matter the functions the language provides, it is essential to know the *Unicode* specification. For instance, a program that assumes there is only *uppercase* and *lowercase* is making a wrong assumption.

-- [PHP Reference](https://www.php.net/manual/en/language.types.string.php)

## Numeric strings

A PHP `string` is considered *numeric* if it can be interpreted as an `int` or a `float`.

Formally as of PHP 8.0.0:

```
WHITESPACES      \s*
LNUM             [0-9]+
DNUM             ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
EXPONENT_DNUM    (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
INT_NUM_STRING   {WHITESPACES} [+-]? {LNUM} {WHITESPACES}
FLOAT_NUM_STRING {WHITESPACES} [+-]? ({DNUM} | {EXPONENT_DNUM}) {WHITESPACES}
NUM_STRING       ({INT_NUM_STRING} | {FLOAT_NUM_STRING})
```

PHP also has a concept of *leading numeric strings*. This is simply a string which starts like a numeric string followed by any characters.

Note:

Any string that contains the letter `E` (case insensitive) bounded by numbers will be seen as a number expressed in *scientific notation*. This can produce unexpected results.

*Example: Scientific notation comparisons*

```php
<?php
var_dump("0D1" == "000"); // false, "0D1" is not scientific notation
var_dump("0E1" == "000"); // true, "0E1" is 0 * (10 ^ 1), or 0
var_dump("2E1" == "020"); // true, "2E1" is 2 * (10 ^ 1), or 20
?>
```

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

### Strings used in numeric contexts

When a `string` needs to be evaluated as *number* (e.g. *arithmetic operations*, *`int` type declaration*, etc.) the following steps are taken to determine the outcome:

* If the `string` is *numeric*, resolve to an `int` if the *string* is an *integer numeric string* and fits into the limits of the int type limits (as defined by `PHP_INT_MAX`), otherwise resolve to a `float`.
* If the context allows *leading numeric strings* and the `string` is one, resolve to an `int` if the leading part of the `string` is an *integer numeric string* and fits into the limits of the int type limits (as defined by `PHP_INT_MAX`), otherwise resolve to a `float`. Additionally an error of level E_WARNING is raised.
* The `string` is not *numeric*, throw a `TypeError`.

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

### Behavior prior to PHP 8.0.0

Prior to PHP 8.0.0, a `string` was considered *numeric* only if it had *leading whitespaces*, if it had *trailing whitespaces* then the `string` was considered to be *leading numeric*.

Prior to PHP 8.0.0, when a `string` was used in a *numeric context* it would perform the same steps as above with the following differences:

* The usage of a *leading numeric string* would raise an `E_NOTICE` instead of an `E_WARNING`.
* If the `string` is not *numeric*, an `E_WARNING` was raised and the value `0` would be returned.

Prior to PHP 7.1.0, neither E_NOTICE nor `E_WARNING` was raised.

```php
<?php
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
$foo = 1 + "bob-1.3e3";           // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "bob3";                // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "10 Small Pigs";       // $foo is integer (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1;          // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1.0;        // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
?>
```

-- [PHP Reference](www.php.net/manual/en/language.types.numeric-strings.php)

## Examples

*Example: String length and word count*

```php
<?php

$word = "hello";
print("word = " . $word . "\n");
print("length: " . strlen($word) . "\n\n");

$cite = "Stat rosa pristina nomine, nomina nuda tenemus.";
print("cite = " . $cite . "\n");
print("length: " . strlen($cite) . "\n");
print("words quantity: " . str_word_count($cite) . "\n\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_length_and_word_count.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
word = hello
length: 5

cite = Stat rosa pristina nomine, nomina nuda tenemus.
length: 47
words quantity: 7

```

*Example: String cases*

```php
<?php

$cite = "Stat rosa pristina nomine, nomina nuda tenemus.";
print("cite = {$cite}\n\n");

$upper_case_cite = strtoupper($cite);
print("upper case: {$upper_case_cite}\n");

$lower_case_cite = strtolower($cite);
print("lower case: {$lower_case_cite}\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_cases.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
cite = Stat rosa pristina nomine, nomina nuda tenemus.

upper case: STAT ROSA PRISTINA NOMINE, NOMINA NUDA TENEMUS.
lower case: stat rosa pristina nomine, nomina nuda tenemus.
```

*Example: String concatenation*

```php
<?php

$s1 = "abc";
$s2 = "def";
$s3 = $s1 . $s2;
print("$s1 . $s2 = $s3\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_concatenation.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
abc . def = abcdef
```

*Example: String trimming*

```php
<?php

$sententia = "   Sapere aude.   ";
print("sententia = <{$sententia}>\n\n");

$trimmed_sententia = trim($sententia);

print("trimmed sententia = <{$trimmed_sententia}>\n\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/scalar/strings/string_trimming.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
sententia = <   Sapere aude.   >

trimmed sententia = <Sapere aude.>

```

[▵ Up](#strings)
[⌂ Home](../../../../../README.md)
[▲ Previous: Floating point](../floating_point/floating_point.md)
[▼ Next: Arrays](../../compound/arrays/arrays.md)
