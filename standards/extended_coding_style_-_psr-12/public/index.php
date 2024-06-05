<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use PHPLab\StandardPSR12\{
    HtmlDoc,
    HtmlDocAuthor
};

use PHPLab\StandardPSR12\Language\EngGBLangTrait;
use PHPLab\StandardPSR12\User;

use PHPLab\StandardPSR12\Person\Identifiable;
use PHPLab\StandardPSR12\Person\Presentable;

$newLineSeq = '<br>';

function separate()
{
    print('<br>');
}

$user = new User();

$user->level = 3;

print('Level: ' . $user->getLevelVisualisation() . $newLineSeq);
print('Upgrade: ' . $user->getLevelUpgradeVisualisation(5) . $newLineSeq);

separate();

$user->addEducations('Automatic Controll', 'Economics');

foreach($user->educations as $education) {
    print('Educated at ' . $education . $newLineSeq);
}

separate();

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

separate();

$user->makeSkillsPresentation($skillPresentation);

$htmlDoc = new HtmlDoc();
$htmlDocAuthor = new HtmlDocAuthor();
$htmlDoc->setAuthor($htmlDocAuthor);

separate();

print('Is virtual: ' . ($user->isVirtual() ? 'yes' : 'no') . $newLineSeq);

separate();

print('Users count: ' . $user->getCount() . $newLineSeq);

separate();

$human = new class implements
    Identifiable,
    Presentable
{
    protected function hasMiddleName(): bool
    {
        return false;
    }

    public function setName($firstName, $lastName, $middleName = '')
    {
    }

    public function getName(): string
    {
        return 'David Coder';
    }

    public function getPesel(): ?int
    {
        return '01234567890';
    }
};

print('Guest name: ' . $human->getName() . $newLineSeq);

separate();

require_once('view.php');
