<?php

$roles = [
    'PHP backend developer with Symfony',
    'JavaScript frontend developer with React',
    'Automatic tester with Python',
    'Manual tester',
    'DevOps engineer with AWS',
];

$rolesNumber = count($roles);

for ($i = 0; $i < $rolesNumber; $i++) {
    print('Role no. ' . ($i + 1) . ': ' . $roles[$i] . PHP_EOL);
}
