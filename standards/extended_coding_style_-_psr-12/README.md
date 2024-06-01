# Extended coding style - PSR-12

[Official documentation](https://www.php-fig.org/psr/psr-12/)

This specification extends, expands and replaces [PSR-2](https://www.php-fig.org/psr/psr-2/), the coding style guide and requires adherence to [PSR-1](https://www.php-fig.org/psr/psr-1/), the basic coding standard.

Like [PSR-2](https://www.php-fig.org/psr/psr-2/), the intent of this specification is to **reduce cognitive friction when scanning code from different authors**. It does so by enumerating a shared set of rules and expectations about how to format PHP code. This PSR seeks to provide a set way that coding style tools can implement, projects can declare adherence to and developers can easily relate to between different projects. When various authors collaborate across multiple projects, it helps to have one set of guidelines to be used among all those projects. Thus, the benefit of this guide is not in the rules themselves but the sharing of those rules.

[PSR-2](https://www.php-fig.org/psr/psr-2/) was accepted in 2012 and since then a number of changes have been made to PHP which has implications for coding style guidelines. Whilst [PSR-2](https://www.php-fig.org/psr/psr-2/) is very comprehensive of PHP functionality that existed at the time of writing, new functionality is very open to interpretation. This PSR, therefore, seeks to clarify the content of [PSR-2](https://www.php-fig.org/psr/psr-2/) in a more modern context with new functionality available, and make the errata to [PSR-2](https://www.php-fig.org/psr/psr-2/) binding.

## General

**Code MUST follow all rules outlined in [PSR-1](https://www.php-fig.org/psr/psr-1/).**

**The term `StudlyCaps` in [PSR-1](https://www.php-fig.org/psr/psr-1/) MUST be interpreted as `PascalCase` where the first letter of each word is capitalized including the very first letter.**

## Files

#### ✤ File ending character

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

#### ✤ File ending line

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

#### ✤ Omitting of the ending PHP tag `?>`

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

#### ✤ Line length hard limit

**There MUST NOT be a hard limit on line length.**

#### ✤ Line lenght soft limit

**The soft limit on line length MUST be `120` characters.**

#### ✤ Line length recomended limit

**Lines SHOULD NOT be longer than `80` characters.**

**Lines longer than that SHOULD be split into multiple subsequent lines of no more than `80` characters each.**

#### ✤ Trailing whitespaces at the end of lines

**There MUST NOT be trailing whitespace at the end of lines**

#### ✤ Blank lines for redability

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

#### ✤ Allowed number of statements per line

**There MUST NOT be more than `1` statement per line.**

## Indenting

#### ✤ Indenting character

**Code MUST use `spaces` for indenting.**

**MUST NOT use tabs for indenting.**

#### ✤ Indenting length

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

#### ✤ Header of a PHP file contents

**The header of a PHP file may consist of a number of different blocks.**

#### ✤ Blank line separators of the blocks in a header of a PHP file

**If present, each of the blocks MUST be separated by a single blank line and MUST not contain a blank line.**

#### ✤ Order of the blocks in a header of a PHP file

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

#### ✤ Header of the files with mix of HTML and PHP

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

#### ✤ Opening `<?php` tag

**When the opening `<?php` tag is on the first line of the file, it MUST be on its own line with no other statements unless it is a file containing markup outside of PHP opening and closing tags.**

## Directives

#### ✤ Declare statements formatting

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

#### ✤ Block declare statements formatting

**Block declare statements are allowed and MUST be formatted as below. Note position of braces and spacing:**
```
declare(ticks=1) {

    // some code

}
```

#### ✤ Strict types declaration formatting in files containing markup outside PHP opening and closing tags

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

#### ✤ Use declarations placement

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

#### ✤ Fully qualified import statements

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

#### ✤ Import with compound namespaces

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

#### ✤ Keywords case

**All PHP reserved keywords MUST be in `lower case`.**

The PHP constants `true`, `false`, and `null` should be in `lower case` too.

#### ✤ Types case

**All PHP reserved types MUST be in lower case.**

#### ✤ Types short/log forms

**Short form of type keywords MUST be used i.e. `bool` instead of `boolean`, `int` instead of `integer` etc.**

```php
class User
{
    public bool $registered = true;
    public int $level = 10;
}
```
