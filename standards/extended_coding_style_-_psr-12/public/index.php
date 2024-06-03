<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor
};

use PHPLab\StandardPSR12\Language\EngGBLangTrait;
use PHPLab\StandardPSR12\User;

$user = new User();

$user->level = 3;
print('Level: ' . $user->getLevelVisualisation() . PHP_EOL);
print('Upgrade: ' . $user->getLevelUpgradeVisualisation(5) . PHP_EOL);

$user->skills = ['PHP', 'SQL', 'Git'];
print('Skills: ' . $user->getSkillsVisualisation() . PHP_EOL);

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

require_once('view.php');
