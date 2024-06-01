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
    public $languageCode = 'en-GB';
    public $charset = 'utf-8';
    public $language = 'english';
    public $description = 'PSR-12 example document';
    public $keywords = 'php,psr,psr-12';
    public $author;
    public $title = 'Some PSR-12 example page';
    public $header = 'PSR-12 example';
    public $footer = 'Copyright PHP.lab 2024';
    public $content = 'Hi, there!';

    public function setAuthor(HTMLDocAuthor $htmlDocAuthor)
    {
        $this->author = [
            'name' => $htmlDocAuthor->name,
            'email' => $htmlDocAuthor->email,
        ];
    }
}
