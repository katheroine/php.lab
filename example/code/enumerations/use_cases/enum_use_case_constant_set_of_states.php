<?php

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
