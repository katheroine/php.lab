<?php

enum status
{
  case draft;
  case pending;
  case published;
  case soft_deleted;
  case restored;
  case deleted;
  case testing;
  case revising;
  case accepted;
}

print("status draft: ");
print_r(status::draft);
print("status pending: ");
print_r(status::pending);
print("status published: ");
print_r(status::published);
print("status soft_deleted: ");
print_r(status::soft_deleted);
print("status restored: ");
print_r(status::restored);
print("status deleted: ");
print_r(status::deleted);
print("status testing: ");
print_r(status::testing);
print("status revising: ");
print_r(status::revising);
print("status accepted: ");
print_r(status::accepted);

print("\n");

$post_status = status::published;
print("post_status: ");
print_r($post_status);
$post_status = status::testing;
print("post_status: ");
print_r($post_status);

print("\n");
