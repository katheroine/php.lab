<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class Adept
{
    public $curiosity = "How the time works?";
}

class Craftman extends Adept
{
    public $knowledge = "There's a time dilation.";
}

class Master extends Craftman
{
    public $wisdom = "GPS clocks need time correction.";
}

class Association
{
    function affiliate(Craftman $member)
    {
        print(
            $member->curiosity . PHP_EOL
            . $member->knowledge . PHP_EOL . PHP_EOL
        );
    }

    function getGuide(): Craftman
    {
        return new Craftman();
    }
}

class Club extends Association
{
    function affiliate(Adept $member)
    {
        print($member->curiosity . PHP_EOL . PHP_EOL);
    }

    function getGuide(): Master
    {
        return new Master();
    }
}

function communityMeeting(Association $group)
{
    $newMember = new Craftman();

    print("Affiliating:\n\n");
    $group->affiliate($newMember);

    $newGuide = $group->getGuide();

    print("Guidance:\n\n");
    print(
        "Guide curiosity: {$newGuide->curiosity}\n"
        . "Guide knowledge: {$newGuide->knowledge}\n\n"
    );
}

$someGroup = new Association();
print("# Association:\n\n");
communityMeeting($someGroup);

$otherGroup = new Club();
print("# Club:\n\n");
communityMeeting($otherGroup);
