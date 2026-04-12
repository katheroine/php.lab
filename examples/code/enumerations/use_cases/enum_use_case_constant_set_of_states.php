<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

enum Status
{
    case Draft;
    case Pending;
    case Published;
    case SoftDeleted;
    case Restored;
    case Deleted;
    case Revising;
    case Accepted;
}

$postStatus = Status::Published;
print("Post status: ");
print_r($postStatus);
$postStatus = Status::Revising;
print("Post status: ");
print_r($postStatus);

print(PHP_EOL);
