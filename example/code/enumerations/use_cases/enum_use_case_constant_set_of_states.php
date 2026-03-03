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

print("Status Draft: ");
print_r(Status::Draft);
print("Status Pending: ");
print_r(Status::Pending);
print("Status Published: ");
print_r(Status::Published);
print("Status Soft Deleted: ");
print_r(Status::SoftDeleted);
print("Status Restored: ");
print_r(Status::Restored);
print("Status Deleted: ");
print_r(Status::Deleted);
print("Status Revising: ");
print_r(Status::Revising);
print("Status Accepted: ");
print_r(Status::Accepted);

print(PHP_EOL);

$postStatus = Status::Published;
print("Post status: ");
print_r($postStatus);
$postStatus = Status::Revising;
print("Post status: ");
print_r($postStatus);

print(PHP_EOL);
