<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class Association
{
    protected array $members = [];
    public int $strength = 0;

    public function __construct(
        public string $name,
        protected string $chairman,
    ) {
        $this->affiliate($chairman);
    }

    protected function affiliate(string $member)
    {
        $this->members[] = $member;
        ++$this->strength;
    }
}

class Club extends Association
{
    public array $members;

    public function affiliate(string $member)
    {
        parent::affiliate($member);
    }
}

function communityMeeting(Association $group)
{
    print(
        "Group name: {$group->name}\n"
        . "Group strength: {$group->strength}\n\n"
    );
}

$someGroup = new Association('Western Academy Top Graduates', 'Simon Daffodil');
print("# Association:\n\n");
communityMeeting($someGroup);

$otherGroup = new Club('Jotter Hobbyist Pen Club', 'Katy Pernickety');
$otherGroup->affiliate('Doris Frog');
$otherGroup->affiliate('Arthur Carbony');
$otherGroup->affiliate('John Thyme');
$otherGroup->affiliate('Kitty Pranky');
print("# Club:\n\n");
communityMeeting($otherGroup);
print("Members:\n");
foreach($otherGroup->members as $member) {
    print($member . PHP_EOL);
}
