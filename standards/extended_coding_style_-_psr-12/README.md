# Extended coding style - PSR-12

[Official documentation](https://www.php-fig.org/psr/psr-12/)

This specification extends, expands and replaces [PSR-2](https://www.php-fig.org/psr/psr-2/), the coding style guide and requires adherence to [PSR-1](https://www.php-fig.org/psr/psr-1/), the basic coding standard.

Like [PSR-2](https://www.php-fig.org/psr/psr-2/), the intent of this specification is to **reduce cognitive friction when scanning code from different authors**. It does so by enumerating a shared set of rules and expectations about how to format PHP code. This PSR seeks to provide a set way that coding style tools can implement, projects can declare adherence to and developers can easily relate to between different projects. When various authors collaborate across multiple projects, it helps to have one set of guidelines to be used among all those projects. Thus, the benefit of this guide is not in the rules themselves but the sharing of those rules.

[PSR-2](https://www.php-fig.org/psr/psr-2/) was accepted in 2012 and since then a number of changes have been made to PHP which has implications for coding style guidelines. Whilst [PSR-2](https://www.php-fig.org/psr/psr-2/) is very comprehensive of PHP functionality that existed at the time of writing, new functionality is very open to interpretation. This PSR, therefore, seeks to clarify the content of [PSR-2](https://www.php-fig.org/psr/psr-2/) in a more modern context with new functionality available, and make the errata to [PSR-2](https://www.php-fig.org/psr/psr-2/) binding.

## General

**Code MUST follow all rules outlined in [PSR-1](https://www.php-fig.org/psr/psr-1/).**

**The term `StudlyCaps` in [PSR-1](https://www.php-fig.org/psr/psr-1/) MUST be interpreted as `PascalCase` where the first letter of each word is capitalized including the very first letter.**

## Files

##### ✤ File ending character

**All PHP files MUST use the `Unix LF (linefeed)` line ending only.**

A [newline](https://en.wikipedia.org/wiki/Newline) (frequently called **line ending**, **end of line (`EOL`)**, **next line (`NEL`)** or **line break**) is a control character or sequence of control characters in character encoding specifications such as `ASCII`, `EBCDIC`, `Unicode`, etc. This character, or a sequence of characters, is used to signify the end of a line of text and the start of a new one.

The Unicode standard defines a number of characters that conforming applications should recognize as line terminators:

* `LF` - Line Feed, U+000A
* `VT` - Vertical Tab, U+000B
* `FF` - Form Feed, U+000C
* `CR` - Carriage Return, U+000D
* `CR+LF` - CR (U+000D) followed by LF (U+000A)
* `NEL` - Next Line, U+0085
* `LS` - Line Separator, U+2028
* `PS` - Paragraph Separator, U+2029

**`LF`** is recognized by POSIX standard oriented systems: `Unix` and Unix-like systems (`Linux`, `macOS`, `*BSD`, `AIX`, `Xenix`, etc.), `QNX 4+`, `Multics`, `BeOS`, `Amiga`, `RISC OS`, and others[5]

**`CR+LF`** is recognized by `Windows`, `MS-DOS` compatibles, `Atari TOS`, `DEC TOPS-10`, `RT-11`, `CP/M`, `MP/M`, `OS/2`, `Symbian OS`, `Palm OS`, `Amstrad CPC`, and most other early non-Unix and non-IBM operating systems

The line ending character can be set in the code editor or IDE settings (usually it is LF by default).

##### ✤ File ending line

**All PHP files MUST end with a non-blank line, terminated with a single `LF`.**

```php
<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');

```

##### ✤ Omitting of the ending PHP tag `?>`

**The closing `?>` tag MUST be omitted from files containing only PHP.**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

### Lines

##### ✤ Line length hard limit

**There MUST NOT be a hard limit on line length.**

##### ✤ Line lenght soft limit

**The soft limit on line length MUST be `120` characters.**

##### ✤ Line length recomended limit

**Lines SHOULD NOT be longer than `80` characters.**

**Lines longer than that SHOULD be split into multiple subsequent lines of no more than `80` characters each.**

##### ✤ Trailing whitespaces at the end of lines

**There MUST NOT be trailing whitespace at the end of lines**

##### ✤ Blank lines for redability

**Blank lines MAY be added to improve readability and to indicate related blocks of code except where explicitly forbidden.**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

##### ✤ Allowed number of statements per line

**There MUST NOT be more than `1` statement per line.**

## Indenting

##### ✤ Indenting character

**Code MUST use `spaces` for indenting.**

**MUST NOT use tabs for indenting.**

##### ✤ Indenting length

**Code MUST use an indent of `4` spaces for each indent level.**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDoc
{
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-1 example document';
    public $keywords = 'php,psr,psr-1';
    public $author;
    public $title = 'Some PSR-1 example page';
    public $header = 'PSR-1 example';
    public $footer = 'Copyright PHP.lab 2024';
    public $content = 'Hi, there!';

    public function setAuthor($htmlDocAuthor)
    {
        $this->author = [
            'name' => $htmlDocAuthor->name,
            'email' => $htmlDocAuthor->email,
        ];
    }
}

```

## Header of a PHP file

##### ✤ Header of a PHP file contents

**The header of a PHP file may consist of a number of different blocks.**

##### ✤ Blank line separators of the blocks in a header of a PHP file

**If present, each of the blocks MUST be separated by a single blank line and MUST not contain a blank line.**

##### ✤ Order of the blocks in a header of a PHP file

**Each block MUST be in the order listed below, although blocks that are not relevant may be omitted:**
* **opening `<?php` tag**
* **file-level docblock**
* **one or more declare statements**
* **the namespace declaration of the file**
* **one or more class-based…**
* **…function-based…**
* **…constant-based use import statements**
* **the remainder of the code in the file**

```php
<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2024 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

use PHPLab\StandardPSR12\HtmlDocAuthor;

class HtmlDoc
{
}

```

##### ✤ Header of the files with mix of HTML and PHP

**When a file contains a mix of HTML and PHP, any of the above sections may still be used.**

**If so, they MUST be present at the top of the file, even if the remainder of the code consists of a closing PHP tag and then a mixture of HTML and PHP.**

```php
<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2024 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

use PHPLab\StandardPSR12\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);
?>

<!doctype html>
<html lang="<?= $htmlDoc->languageCode ?>">
  <head>
    <meta charset="<?= $htmlDoc->charset ?>">
    <meta name="language" content="<?= $htmlDoc->language ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $htmlDoc->description ?>">
    <meta name="keywords" content="<?= $htmlDoc->keywords ?>">
    <meta name="author" content="<?= $htmlDoc->author['name'] ?> <<?= $htmlDoc->author['email'] ?>>">
    <title><?= $htmlDoc->title ?></title>
  </head>
  <body>
    <?php if (isset($htmlDoc->header)): ?>
    <header>
        <?= $htmlDoc->header ?>
    </header>
    <?php endif; ?>
    <?php if (isset($htmlDoc->content)): ?>
    <div id="content">
        <?= $htmlDoc->content ?>
    </div>
    <?php endif; ?>
    <?php if (isset($htmlDoc->footer)): ?>
    <footer>
        <?= $htmlDoc->footer ?>
    </footer>
    <?php endif; ?>
  </body>
</html>

```

##### ✤ Opening `<?php` tag

**When the opening `<?php` tag is on the first line of the file, it MUST be on its own line with no other statements unless it is a file containing markup outside of PHP opening and closing tags.**

## Directives

##### ✤ Declare statements formatting

**Declare statements MUST contain no spaces and MUST be exactly `declare(strict_types=1)` (with an optional semi-colon terminator).**

```php
<?php

declare(strict_types=1);

namespace PHPLab\StandardPSR12;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

##### ✤ Block declare statements formatting

**Block declare statements are allowed and MUST be formatted as below. Note position of braces and spacing:**
```
declare(ticks=1) {

    // some code

}
```

##### ✤ Strict types declaration formatting in files containing markup outside PHP opening and closing tags

**When wishing to declare strict types in files containing markup outside PHP opening and closing tags, the declaration MUST be on the first line of the file and include an opening PHP tag, the strict types declaration and closing tag:**
```
<?php declare(strict_types=1) ?>
```

```php
<?php declare(strict_types=1) ?>
<!doctype html>
<html lang="<?= $htmlDoc->languageCode ?>">
  <head>
    <meta charset="<?= $htmlDoc->charset ?>">
    <meta name="language" content="<?= $htmlDoc->language ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $htmlDoc->description ?>">
    <meta name="keywords" content="<?= $htmlDoc->keywords ?>">
    <meta name="author" content="<?= $htmlDoc->author['name'] ?> <<?= $htmlDoc->author['email'] ?>>">
    <title><?= $htmlDoc->title ?></title>
  </head>
  <body>
    <?php if (isset($htmlDoc->header)): ?>
    <header>
        <?= $htmlDoc->header ?>
    </header>
    <?php endif; ?>
    <?php if (isset($htmlDoc->content)): ?>
    <div id="content">
        <?= $htmlDoc->content ?>
    </div>
    <?php endif; ?>
    <?php if (isset($htmlDoc->footer)): ?>
    <footer>
        <?= $htmlDoc->footer ?>
    </footer>
    <?php endif; ?>
  </body>
</html>

```

## Imports

##### ✤ Use declarations placement

**Import statements MUST never begin with a leading backslash.**

* Wrong:

```php
use \PHPLab\StandardPSR12\HtmlDoc;
use \PHPLab\StandardPSR12\HtmlDocAuthor;
```

* Right:

```php
use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;
```

##### ✤ Fully qualified import statements

**Import statements MUST always be fully qualified.**

* Wrong:

```php
use StandardPSR12\HtmlDoc;
use HtmlDocAuthor;
```

* Right:

```php
use PHPLab\StandardPSR12\HtmlDoc;
use PHPLab\StandardPSR12\HtmlDocAuthor;
```

##### ✤ Import with compound namespaces

**Compound namespaces with a depth of more than two MUST NOT be used.**

* Right:

```php
use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor,
    Language\EngGBLangTrait
};
```

```php
use PHPLab\{
    StandardPSR12\HtmlDoc,
    StandardPSR12\HtmlDocAuthor
};

use PHPLab\StandardPSR12\Language\EngGBLangTrait;
```

* Wrong:

```php
use PHPLab\{
    StandardPSR12\HtmlDoc,
    StandardPSR12\HtmlDocAuthor,
    StandardPSR12\Language\EngGBLangTrait
};
```

## Keywords, types & predefined constants

##### ✤ Keywords case

**All PHP reserved keywords MUST be in `lower case`.**

The PHP constants `true`, `false`, and `null` should be in `lower case` too.

##### ✤ Types case

**All PHP reserved types MUST be in lower case.**

##### ✤ Types short/log forms

**Short form of type keywords MUST be used i.e. `bool` instead of `boolean`, `int` instead of `integer` etc.**

```php
class User
{
    public bool $registered = true;
    public int $level = 10;
}
```

## Operators

##### ✤ Multiple spaces around an operator

**When space is permitted around an operator, multiple spaces MAY be used for readability purposes.**

```php
$this->email = 'author@'
    . self::EMAIL_DOMAIN;
```

### Unary operators

##### ✤ Space between the operator and operand in the increment & decrement operators

**The increment/decrement operators MUST NOT have any space between the operator and operand.**

```php
$this->level++;
```

##### ✤ Space within the parentheses in type casting operators

**Type casting operators MUST NOT have any space within the parentheses.**

```php
$isWorking = (bool) $this->level;
```

### Binary operators

##### ✤ Spaces around the binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators

**All binary arithmetic, comparison, assignment, bitwise, logical, string, and type operators MUST be preceded and followed by at least one space.**

```php
$this->email = 'author@' . self::EMAIL_DOMAIN;
```

### Ternary operators

##### ✤ Spaces around the characters of the conditional operator

**The conditional operator, also known simply as the ternary operator, MUST be preceded and followed by at least one space around both the `?` and `:` characters.**

```php
$label = empty($this->nickname) ? $this->firstName : $this->nickname;
```

##### ✤ Spaces around the characters of the conditional operator when the middle operand is omitted

**When the middle operand of the conditional operator is omitted, the operator MUST follow the same style rules as other binary comparison operators.**

```php
$isActive = $this->isRegistered ?: (bool) $this->level;
```

## Control structures

##### ✤ Space after control structure keyword

**There MUST be one space after the control structure keyword.**

##### ✤ Space after opening parethensis in control structure

**There MUST NOT be a space after the opening parenthesis.**

##### ✤ Space before closing parethensis in control structure

**There MUST NOT be a space before the closing parenthesis.**

`if (! $this->isRegistered)`

##### ✤ Space between closing parethensis and opening brace

**There MUST be one space between the closing parenthesis and the opening brace.**

##### ✤ Closing brace placement in control structure

**The closing brace MUST be on the next line after the body.**

```
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
}
```

##### ✤ Control structure body indention

**The structure body MUST be indented once.**

##### ✤ Control structure body placement

**The body MUST be on the next line after the opening brace.**

##### ✤ Control structure body enclosed by braces to indicate control structure body regardless of the number of statements it contains

**The body of each structure MUST be enclosed by braces.**

*This standardizes how the structures look and reduces the likelihood of introducing errors as new lines get added to the body.*

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

## Control structure `if` - `elseif` - `else`

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

##### ✤ Keywords `else if` or keyword `elseif`

**The keyword `elseif` SHOULD be used instead of `else if` so that all control keywords look like single words.**

* Wrong:

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} else if ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

* Right:

```php
if (! $this->isRegistered) {
    $status = self::STATUS_HALTING;
} elseif ($this->level > 10) {
    $status = self::STATUS_INVOLVED;
} else {
    $status = self::STATUS_CERTAIN;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**

```php
if (
    $this->isRegistered
    && $this->level > 10
) {
    $status = self::STATUS_INVOLVED;
}
```

### Control structure `switch` - `case`

```php
switch($status) {
    case self::STATUS_HALTING:
        $description = "Started to use the application.";
        break;
    case self::STATUS_CERTAIN:
        $description = "Using the application.";
        break;
    case self::STATUS_INVOLVED:
        $description = "Engeged in using the application";
        break;
    default:
        $description = "";
        break;
}
```

##### ✤ Statement case indention

**The `case` statement MUST be indented once from `switch`.**

##### ✤ Keyword break indention

**The `break` keyword (or other terminating keywords) MUST be indented at the same level as the `case` body.**

##### ✤ Comment such as `//` no break when fall-through is intentional in a non-empty case body

```
switch($status) {
    case self::STATUS_HALTING:
        $description = "Started to use the application.";
        break;
}
```

**There MUST be a comment such as // no break when fall-through is intentional in a non-empty case body.**

```
switch($status) {
    case self::STATUS_HALTING:
        // the same as following;
    case self::STATUS_CERTAIN:
        $description = "Using the application.";
        break;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**

```
switch(
    (bool) $status
    && $this->isRegistered
) {
}
```

### Control structure `while`, `do` - `while`

#### Control structure `while`

```php
while ($quantity > 0) {
    $visualisation .= '*';

    $quantity--;
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first condition MUST be on the next line.**

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

##### ✤ Boolean operators between conditions placement when expression is split across multiple lines

**Boolean operators between conditions MUST always be at the beginning or at the end of the line, not a mix of both.**

```
while (
    $quantity > 0
    && $this->isRegistered
) {
}
```

#### Control structure `do` - `while`

```php
do {
    $visualisation .= '#';

    $upgrade--;
} while ($upgrade > 0);

```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**

##### ✤ First condition placement when expression is split across multiple lines

**When doing so, the first expression MUST be on the next line.**

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

```
do {
} while (
    $upgrade > 0
    && $this->isRegistered
);

```

### Control structure `for`

```php
for ($i = 1; $i <= $skillsCount; $i++) {
    $visualisation .= $i . '. ' . $skills[$i - 1] . ', ';
}
```

##### ✤ Splitting expression in parentheses across multiple lines

**Expressions in parentheses MAY be split across multiple lines, where each subsequent line is indented at least once.**

##### ✤ First expression placement when expression is split across multiple lines

**When doing so, the first expression MUST be on the next line.**

##### ✤ Closing parenthesis and opening brace placement when expression is split across multiple lines

**The closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

```
for (
    $i = 1;
    $i <= $skillsCount;
    $i++) {
}
```

## Closures & Functions

```php
$skillPresentation = function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq) {
    print($skill['name'] . ': ' . $skill['level']. $newLineSeq);
};
```

##### ✤ Space after `function` keyword in closure definition

**Closures MUST be declared with a space after the `function` keyword.**

##### ✤ Space after function name in function definition

**Function names MUST NOT be declared with space after the method name.**

#ToDo

### Argument list

##### ✤ Space after opening parethensis of argument list in closure definition/call

**There MUST NOT be a space after the opening parenthesis of the argument list.**

##### ✤ Space before closing parethensis of argument list in closure definition/call

**There MUST NOT be a space before the closing parenthesis of the argument.**

##### ✤ Space before coma on argument list in closure definition/call

**In the argument list there MUST NOT be a space before each comma.**

##### ✤ Space after coma on argument list in closure definition/call

**In the argument list there MUST NOT be a space after each comma.**

`function ($skillCodename, $skill)`

##### ✤ Closure arguments with default values placement in closure definition/call

**Closure arguments with default values MUST go at the end of the argument list.**

`function ($skillCodename = 'programming', $skill = ['name' => 'Programming', 'level' => 3])`

##### ✤ List of function/closure arguments split acros multi lines in closure definition/call

**Argument lists MAY be split across multiple lines, where each subsequent line is indented once.**

##### ✤ Arguments placement on list of function/closure arguments split acros multi lines in closure definition/call

**When doing so, the first item in the list MUST be on the next line.**

##### ✤ Number of arguments per line on list of function/closure arguments split acros multi lines in closure definition/call

**There MUST be only one argument per line.**

##### ✤ Closing parenthesis and opening brace in closure with list of closure arguments split acros multi lines in closure definition/call

**When the ending list of arguments is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

```php
function (
    $skillCodename,
    $skill
) {
}
```

### Keyword `use`

##### ✤ Space before `use` keyword in closure definition

**Closures MUST be declared with a space before the `use` keyword.**

##### ✤ Space after `use` keyword in closure definition

**Closures MUST be declared with a space after the `use` keyword.**

##### ✤ Keyword `use` in closure declaration

**If the `use` keyword is present, the colon MUST follow the use list closing parentheses with no spaces between the two characters.**

### Variable list

##### ✤ Space after opening parethensis of variable list in closure definition/call

**There MUST NOT be a space after the opening parenthesis of the variable list.**

##### ✤ Space before closing parethensis of variable list in closure definition/call

**There MUST NOT be a space before the closing parenthesis of the variable list.**

##### ✤ Space before coma on variable list in closure definition/call

**In the variable list, there MUST NOT be a space before each comma.**

##### ✤ Space after coma on variable list in closure definition/call

**In the variable list, there MUST NOT be a space after each comma.**

`function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq)`

##### ✤ List of closure variables split acros multi lines in closure definition/call

**Variable lists MAY be split across multiple lines, where each subsequent line is indented once.**

##### ✤ Variables placement in list of closure variables split acros multi lines in closure definition/call

**When doing so, the first item in the list MUST be on the next line.**

##### ✤ Number of variables per line on list of closure variables split acros multi lines in closure definition/call

**There MUST be only one variable per line.**

##### ✤ Closing parenthesis and opening brace in closure with list of closure variables split acros multi lines in closure definition/call

**When the ending list of variables is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

```php
function ($skillCodename, $skill) use (
    $levelMarkChar,
    $newLineSeq
) {
}
```

##### ✤ Space between method name and opening parenthesis in function call

**When making a function call, there MUST NOT be a space between the method or function name and the opening parenthesis.**

```php
$skillPresentation($skillCodename, $skill);
```

### Braces

##### ✤ Opening brace placement in closure definition/call

**The opening brace MUST go on the same line.**

##### ✤ Closing brace placement in closure definition/call

**Closing brace MUST go on the next line following the body.**

```php
function ($skillCodename, $skill) use (
    $levelMarkChar,
    $newLineSeq
) {
}
```

### Keyword `return`

##### ✤ Return type declaration in closure definition

**If a return type is present, it MUST follow the same rules as with normal functions and methods.**

`function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq): void`

## Classes

##### ✤ Keyword `extends` placement in class definition

**The `extends` keyword MUST be declared on the same line as the class name.**

```php
class User extends Technician
{
}
```

##### ✤ List of extends split acros multi lines in class definition

**Lists of extends (in the case of interfaces) MAY be split across multiple lines, where each subsequent line is indented once.**

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.**

```php
interface Evidentiable extends
    Presentable,
    Identifiable
{
}
```

##### ✤ Keyword `implements` placement in class definition

**The `implements` keyword MUST be declared on the same line as the class name.**

```php
class Person implements Presentable
{
}
```

##### ✤ List of `implements` split acros multi lines in class definition

**Lists of implements MAY be split across multiple lines, where each subsequent line is indented once.**

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.**

```php
class Person implements
    Presentable,
    Identifiable
{
}
```

##### ✤ Opening brace placement in class definition

**The opening brace for the class MUST go on its own line.**

**Opening braces MUST be on their own line and MUST NOT be preceded or followed by a blank line.**

##### ✤ Closing brace placement in class definition

**The closing brace for the class MUST go on the next line after the body.**

**Closing braces MUST be on their own line and MUST NOT be preceded by a blank line.**

**Any closing brace MUST NOT be followed by any comment or statement on the same line.**

```php
class Person
{
}
```

##### ✤ Keyword `use` placement in class definition

**The `use` keyword used inside the classes to implement traits MUST be declared on the next line after the opening brace.**

```php
class Technician
{
    use Skilled;
}
```

##### ✤ Number of trait including per line in class definition

**Each individual trait that is imported into a class MUST be included one-per-line and each inclusion MUST have its own use import statement.**

```php
class Technician extends Person
{
    use Educated;
    use Skilled;
}
```

##### ✤ Closing brace after the use import placement in class definition

**When the class has nothing after the use import statement, the class closing brace MUST be on the next line after the use import statement.**

##### ✤ Blank line after the use import placement in class definition

**Otherwise, it MUST have a blank line after the use import statement.**

```php
class Technician extends Person
{
    use Educated;
    use Skilled;

    public function isVirtual(): bool
    {
        $isVirtual = ! empty($this->educations) && ! empty($this->skills);

        return $isVirtual;
    }
}
```

##### ✤ Keywords `insteadof` and `as`

**When using the `insteadof` and `as` operators they must be in separated lines with indentations.**

```php
class Technician extends Person
{
    use Educated
    {
        Educated::isVirtual insteadof Skilled;
    }

    use Skilled
    {
        Skilled::isVirtual as isSkilled;
    }
}
```

### Keywords `abstract`, `final` & `static`

##### ✤ Keyword `abstract` placement

**When present, the `abstract` declarations MUST precede the visibility declaration.**

`abstract protected function hasMiddleName(): bool;`

##### ✤ Keyword `final` placement

**When present, the `final` declarations MUST precede the visibility declaration.**

`final public function isVirtual(): bool`

##### ✤ Keyword `static` placement

**When present, the `static` declaration MUST come after the visibility declaration.**

`public static function getCount(): int`

### Class constants

##### ✤ Class constant visiblity declaration

**Visibility MUST be declared on all constants if your project PHP minimum version supports constant visibilities (PHP 7.1 or later).**

```php
public const STATUS_HALTING = 'halting';
public const STATUS_CERTAIN = 'certain';
public const STATUS_INVOLVED = 'involved';
```

### Class properties

##### ✤ Property visiblity declaration

**Visibility MUST be declared on all properties.**

```php
private static $count;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Single underscore prefix in property names for indication of non-public visibility

**Property names MUST NOT be prefixed with a single underscore to indicate protected or private visibility.**

**That is, an underscore prefix explicitly has no meaning.**

* Wrong:

```php
private static $_count = 0;
protected $_isRegistered = false;
public $level = 0;
```

* Right:

```php
private static $count = 0;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Keyword `var` (used to declare property)

**The `var` keyword MUST NOT be used to declare a property.**

* Wrong:

```php
var static $count = 0;
var $isRegistered = false;
var $level = 0;
```

* Right:

```php
private static $count;
protected $isRegistered = false;
public $level = 0;
```

##### ✤ Property type declaration

**There MUST be a space between type declaration and property name.**

```php
private static int $count = 0;
protected bool $isRegistered = false;
public int $level = 0;
```

##### ✤ Property declarations per statement

**There MUST NOT be more than one property declared per statement.**

* Wrong:

```php
public int $level = 0, $score = 5;
```

* Right:

```php
public int $level = 0;
public int $score = 5;
```

### Class methods

##### ✤ Single underscore prefix in method names for indication of non-public visibility

**Method names MUST NOT be prefixed with a single underscore to indicate protected or private visibility.**

**That is, an underscore prefix explicitly has no meaning.**

* Wrong:

```php
protected function _hasMiddleName()
{
    return false;
}
```

* Right:

```php
protected function hasMiddleName()
{
    return false;
}
```

##### ✤ Method visiblity declaration

**Visibility MUST be declared on all methods.**

```php
abstract protected function hasMiddleName();

public function getName()
{
    $name = $firstName
        . $this->hasMiddleName() ? $this->middleName : ' '
        . $lastName;

    return $name;
}

public function getPesel()
{
    return $this->pesel;
}
```

##### ✤ Space after method name in method definition

**Method names MUST NOT be declared with space after the method name.**

`public function getPesel()`

##### ✤ Space after opening parethensis of argument list in method definition/call

**There MUST NOT be a space after the opening parenthesis.**

##### ✤ Space before closing parethensis of argument list in method definition/call

**There MUST NOT be a space before the closing parenthesis.**

##### ✤ Space before coma on argument list in method definition/call

**In the argument list, there MUST NOT be a space before each comma.**

##### ✤ Space after coma on argument list in method definition/call

**In the argument list, there MUST be one space after each comma.**

`public function setName($firstName, $middleName, $lastName)`

##### ✤ List of method arguments with reference operator

**When using the reference operator & before an argument, there MUST NOT be a space after it.**

`public function setAuthor(HTMLDocAuthor &$htmlDocAuthor)`

##### ✤ List of method arguments with variadic three dot operator

**There MUST NOT be a space between the variadic three dot operator and the argument name.**

`public function addEducations(... $educations)`

##### ✤ List of method arguments with reference and variadic three dot operators

**When combining both the reference operator and the variadic three dot operator, there MUST NOT be any space between the two of them.**

##### ✤ Method arguments with default values placement

**Method and function arguments with default values MUST go at the end of the argument list.**

`public function setName($firstName, $lastName, $middleName = '')`

##### ✤ List of method arguments split acros multi lines in method definition/call

**Argument lists MAY be split across multiple lines, where each subsequent line is indented once.**

##### ✤ Arguments placement on list of method arguments split acros multi lines in method definition/call

**When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.**

##### ✤ Number of arguments per line on list of method arguments split acros multi lines in method definition/call

**There MUST be only one argument per line.**

##### ✤ Closing parenthesis and opening brace in method with list of method arguments split acros multi lines in method definition

**When the argument list is split across multiple lines, the closing parenthesis and opening brace MUST be placed together on their own line with one space between them.**

```php
public function setName(
    $firstName,
    $lastName,
    $middleName = '') {
}
```

##### ✤ Single argument being split across multiple lines in method call

**A single argument being split across multiple lines (as might be the case with an anonymous function or array) does not constitute splitting the argument list itself.**

##### ✤ Return type declaration in method definition

**When you have a return type declaration present, there MUST be one space after the colon followed by the type declaration. The colon and declaration MUST be on the same line as the argument list closing parenthesis with no spaces between the two characters.**

`public function getName(): string`

##### ✤ Return type declaration with nullable type in method definition

**In nullable type declarations, there MUST NOT be a space between the question mark and the type.**

`public function getPesel(): ?int`

##### ✤ Opening brace placement in method definition

**The opening brace MUST go on its own line.**

##### ✤ Closing brace placement in method definition

**The closing brace MUST go on the next line following the body.**

##### ✤ Comments or statements following closing brace in method definition

**Any closing brace MUST NOT be followed by any comment or statement on the same line.**

```php
public function getName(): string
{
}
```

##### ✤ Space between method name and opening parenthesis in method call

**When making a method call, there MUST NOT be a space between the method or function name and the opening parenthesis.**

```php
$htmlDoc->setAuthor($htmlDocAuthor);
```

### Class instantiating

##### ✤ Parentheses in class instantiating

**When instantiating a new class, parentheses MUST always be present even when there are no arguments passed to the constructor.**

### Anonymous classes

##### ✤ Opening brace, class keyword and list of implements placement

**The opening brace MAY be on the same line as the class keyword so long as the list of implements interfaces does not wrap. If the list of interfaces wraps, the brace MUST be placed on the line immediately following the last interface.**
