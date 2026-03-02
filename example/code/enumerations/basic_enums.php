<?php

enum SomeBasicEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;
}

print("Information:\n");
var_dump(SomeBasicEnum::SomeCase);
print('Type: ' . gettype(SomeBasicEnum::SomeCase) . PHP_EOL);
print('Class: ' . get_class(SomeBasicEnum::SomeCase) . PHP_EOL . PHP_EOL);

print('Enum case name property: ' . SomeBasicEnum::SomeCase->name . PHP_EOL . PHP_EOL);
