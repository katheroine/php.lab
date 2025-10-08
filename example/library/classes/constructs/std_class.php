<?php

// "A generic empty class with dynamic properties."
// -- https://www.php.net/manual/en/class.stdclass.php

$someObject = new stdClass();

print_r($someObject);

$someObject->title = "Blue Elephant";
$someObject->author = "Katheroine";
$someObject->description = "PHP programming language tutorial";

print_r($someObject);

$otherObject = (object) [
    'nickname' => 'katheroine',
    'language' => 'PHP',
    'area' => 'web development',
    'specialisation' => 'backend'
];

print_r($otherObject);
