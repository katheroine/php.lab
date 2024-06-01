<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor
};

use PHPLab\Language\EngGBLangTrait;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');
