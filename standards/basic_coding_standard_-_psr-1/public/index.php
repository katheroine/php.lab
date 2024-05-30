<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '../src/HtmlDoc.php');
include(__DIR__ . DIRECTORY_SEPARATOR . '../src/HtmlDocAuthor.php');

use PHPLab\StandardPSR1\HtmlDoc;
use PHPLab\StandardPSR1\HtmlDocAuthor;

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');
