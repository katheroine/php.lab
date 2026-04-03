<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
