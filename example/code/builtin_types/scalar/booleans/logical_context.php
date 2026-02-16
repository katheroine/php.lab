<?php

$age = 22;
$hasId = true;
$isCitizen = false;
$technologies = [
    'C++',
    'Java',
    'PHP',
    'Docker',
    'Git',
];

print("Age: {$age}, Has ID: " . ($hasId ? 'yes' : 'no') . ", Citizen: " . ($isCitizen ? 'yes' : 'no') . "\n");

if ($age >= 18 && $hasId) {
    print("Passed age and ID check.\n");
} else {
    print("Failed age or ID check.\n");
}

if (!$isCitizen || $age < 18) {
    print("Cannot vote due to citizenship or age.\n");
}

$status = ($age >= 18 && $isCitizen && $hasId) ? "Eligible" : "Ineligible";
print("Status: $status\n");

print("Skills:\n");

while($technology = current($technologies)) {
    print($technology . ' ');
    next($technologies);
}

print(PHP_EOL);
