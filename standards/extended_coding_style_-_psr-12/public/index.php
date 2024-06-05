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

$newLineSeq = '<br>';
print('Level: ' . $user->getLevelVisualisation() . $newLineSeq);
print('Upgrade: ' . $user->getLevelUpgradeVisualisation(5) . $newLineSeq);

print($newLineSeq);

$user->addEducations('Automatic Controll', 'Economics');

foreach($user->educations as $education) {
    print('Educated at ' . $education . $newLineSeq);
}

print($newLineSeq);

$user->skills = [
    'php' => [
        'name' => 'PHP',
        'level' => 5
    ],
    'sql' => [
        'name' => 'SQL',
        'level' => 4
    ],
    'git' => [
        'name' => 'Git',
        'level' => 2
    ]
];
print('Skills: ' . $user->getSkillsVisualisation() . $newLineSeq);

$levelMarkChar = '#';

$skillPresentation = function ($skillCodename, $skill) use ($levelMarkChar, $newLineSeq) {
    print($skill['name'] . ': ' . $skill['level']. $newLineSeq);
};

print($newLineSeq);

$user->makeSkillsPresentation($skillPresentation);

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

print($newLineSeq);

print('Is virtual: ' . ($user->isVirtual() ? 'yes' : 'no') . $newLineSeq);

print($newLineSeq);

print('Users count: ' . $user->getCount() . $newLineSeq);

print($newLineSeq);

require_once('view.php');
