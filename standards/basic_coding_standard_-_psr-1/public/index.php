<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR1\HtmlDoc;
use PHPLab\StandardPSR1\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');
