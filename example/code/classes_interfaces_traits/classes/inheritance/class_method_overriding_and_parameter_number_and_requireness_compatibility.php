<?php

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

    public function affiliate(string $member)
    {
        $this->members[] = $member;
        ++$this->strength;
    }

    public function display()
    {
        foreach ($this->members as $member) {
            print($member . PHP_EOL);
        }
        print(PHP_EOL);
    }
}

class Club extends Association
{
    public function affiliate(string $member, ?int $id = null)
    {
        parent::affiliate($member);
    }
}

function communityMeeting(Association $group, array $newcomers = [])
{
    print(
        "Group name: {$group->name}\n"
        . "Group strength: {$group->strength}\n\n"
    );

    foreach ($newcomers as $newcomer) {
        $group->affiliate($newcomer);
    }
}

$someGroup = new Association('Western Academy Top Graduates', 'Simon Daffodil');
print("# Association:\n\n");
communityMeeting($someGroup, ['Karen McLaren', 'North Sloth', 'Ib Vermicelli']);
$someGroup->display();

$otherGroup = new Club('Jotter Hobbyist Pen Club', 'Katy Pernickety');
$otherGroup->affiliate('Doris Frog', 3);
$otherGroup->affiliate('Arthur Carbony', 5);
$otherGroup->affiliate('John Thyme');
$otherGroup->affiliate('Kitty Pranky');
print("# Club:\n\n");
communityMeeting($otherGroup);
$otherGroup->display();
