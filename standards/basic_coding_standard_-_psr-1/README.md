# Basic coding standard - PSR-1

[Official documentation](https://www.php-fig.org/psr/psr-1/)

## Files

### Character encoding

**Files MUST use only `UTF-8` without `BOM` for PHP code.**

[UTF-8](https://en.wikipedia.org/wiki/UTF-8) is a variable-length character encoding standard used for electronic communication.
Defined by the [Unicode Standard](https://en.wikipedia.org/wiki/Unicode), the name is derived from Unicode Transformation Format – 8-bit.

The [byte-order mark (BOM)](https://en.wikipedia.org/wiki/Byte_order_mark) is a particular usage of the special Unicode character code, U+FEFF ZERO WIDTH NO-BREAK SPACE, whose appearance as a magic number at the start of a text stream can signal several things to a program reading the text:
* the byte order, or endianness, of the text stream in the cases of 16-bit and 32-bit encodings;
* the fact that the text stream's encoding is Unicode, to a high level of confidence;
* which Unicode character encoding is used.

BOM use is optional. Its presence interferes with the use of UTF-8 by software that does not expect non-ASCII bytes at the start of a file but that could otherwise handle the text stream.

### PHP tag types

**Files MUST use only `<?php` and `<?=` tags.**

```php
<?php

$html_doc_language_code = 'en-GB';
$html_doc_charset = 'utf-8';
$html_doc_language = 'english';
$html_doc_description = 'PSR-1 example document';
$html_doc_keywords = 'php,psr,psr-1';
$html_doc_author = [
    'name' => 'Some Author',
    'email' => 'author@php.lab',
];
$html_doc_title = 'Some PSR-1 example page';

$header = 'PSR-1 example';
$content = 'Hi, there!';
$footer = 'Copyright PHP.lab 2024';

require_once('view.php');

```

```php
<!doctype html>
<html lang="<?= $html_doc_language_code ?>">
  <head>
    <meta charset="<?= $html_doc_charset ?>">
    <meta name="language" content="<?= $html_doc_language ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $html_doc_description ?>">
    <meta name="keywords" content="<?= $html_doc_keywords ?>">
    <meta name="author" content="<?= $html_doc_author['name'] ?> <<?= $html_doc_author['email'] ?>>">
    <title><?= $html_doc_title ?></title>
  </head>
  <body>
    <?php if (isset($header)): ?>
    <header>
        <?= $header ?>
    </header>
    <?php endif; ?>
    <?php if (isset($content)): ?>
    <div id="content">
        <?= $content ?>
    </div>
    <?php endif; ?>
    <?php if (isset($footer)): ?>
    <footer>
        <?= $footer ?>
    </footer>
    <?php endif; ?>
  </body>
</html>

```

### Files purpose

**A file SHOULD `declare new symbols` (classes, functions, constants, etc.) and cause no other `side effects`, or it SHOULD `execute logic` with side effects, but SHOULD NOT do both.**

The phrase *side effects* means execution of logic not directly related to declaring classes, functions, constants, etc., merely from including the file.

*Side effects* include but are not limited to: generating output, explicit use of require or include, connecting to external services, modifying `ini` settings, emitting errors or exceptions, modifying global or static variables, reading from or writing to a file, and so on.

*WARNING! By `logic` we understand any logic of the code here, not strictly the business (domain) logic.*

* Example of file **declaring of new symbol**

```php
<?php

class HtmlDoc
{
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-1 example document';
    public $keywords = 'php,psr,psr-1';
    public $author = [
        'name' => 'Some Author',
        'email' => 'author@php.lab',
    ];
    public $title = 'Some PSR-1 example page';
    public $header = 'PSR-1 example';
    public $footer = 'Copyright PHP.lab 2024';
    public $content = 'Hi, there!';
}

```

* Example of files **executing the logic** (with *side effects*)

```php
<?php

include(__DIR__ . DIRECTORY_SEPARATOR . 'HtmlDoc.php');

$htmlDoc = new HtmlDoc();

require_once('view.php');

```

```php
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

## Classes

### Placing class definitions in the files

**Each class is in a file by itself.**

`HtmlDoc.php`

```php
<?php

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

`HtmlDocAuthor.php`

```php
<?php

class HtmlDocAuthor
{
    public $name = 'Some Author';
    public $email = 'author@php.lab';
}

```

### Class names case

**Class names MUST be declared in `StudlyCaps`.**

```php
<?php

class HtmlDoc
{
}

```

```php
<?php

class HtmlDocAuthor
{
}

```

### Class constants names case

**Class constants MUST be declared in all `UPPER_CASE_WITH_UNDERSCORE_SEPARATORS`.**

```php
<?php

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}

```

### Properties names case

**Whatever naming convention is used SHOULD be applied consistently within a reasonable scope. That scope may be vendor-level, package-level, class-level, or method-level.**

```php
<?php

class HtmlDoc
{
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-1 example document';
    public $keywords = 'php,psr,psr-1';
    public $title = 'Some PSR-1 example page';
    public $header = 'PSR-1 example';
    public $footer = 'Copyright PHP.lab 2024';
    public $content = 'Hi, there!';
}

```

### Method names case

**Method names MUST be declared in `camelCase`.**

```php
<?php

class HtmlDoc
{
    public $author;

    public function setAuthor($htmlDocAuthor)
    {
        $this->author = [
            'name' => $htmlDocAuthor->name,
            'email' => $htmlDocAuthor->email,
        ];
    }
}

```

## Namespaces

### Namespaces requireness

**Code written for `PHP 5.2.x` and before SHOULD use the pseudo-namespacing convention of Vendor_ prefixes on class names.**

```php
<?php

class PHPLab_StandardPSR1_HtmlDoc
{
}

```

**Code written for `PHP 5.3` and after MUST use formal namespaces.**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDoc
{
}

```

### Placing class definitions in the namespaces

**Each class is in a namespace of at least one level: a top-level vendor name.**

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDoc
{
}

```

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
}

```

### Namespaces and class names autoloading convention

**Namespaces and classes MUST follow an "autoloading" PSR: [[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md), [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)].**

The currently applicable autoloading standard is [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)].

In the following examples the `PHPLab` namespace part is the **vendor name** and the `StandardPSR1` part is the **package name**.

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDoc
{
}

```

```php
<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
}

```

#### Intro to the autoloading configuration

The easiest way to introduce [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)] into the project is using the autoload mechanism built-in the [Composer](https://getcomposer.org) dependency manager.

Let's say the project has the following files order:

```
.
├── composer.json
├── composer.lock
├── public
│   ├── index.php
│   └── view.php
├── README.md
├── src
│   ├── HtmlDocAuthor.php
│   └── HtmlDoc.php
└── vendor
```

And the `public/viev.php` is included explicitly in the `public/index.php` file, which is the *front controller* of the web application.

To have all the files from the `src` directory accessible in the `public/index.php` file (and also all the dependencies loaded by the Composer into the `vendor` directory by the command `composer install` or `composer update`) it requires to configure the autoloading in the `composer.json` file, like in the following snippet:

```json
{
    "autoload": {
        "psr-4": {
            "PHPLab\\StandardPSR1\\": [
                "src/"
            ]
        }
    }
}
```

then run the command:

```bash
composer dump-autoload
```

and include the Composer autoload script to the application entry file `public/index.php`:

```php
<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR1\HtmlDoc;
use PHPLab\StandardPSR1\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');

```

All the classes defined in the `src` directory are now accessible in the `public/index.php` file.
