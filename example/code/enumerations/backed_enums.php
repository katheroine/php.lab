<?php

enum SomeBackedEnum: string
{
    case SomeCase = 'some case';
    case OtherCase = 'other case';
    case AnotherCase = 'another case';
}

print("Information:\n");
var_dump(SomeBackedEnum::SomeCase);
print('Type: ' . gettype(SomeBackedEnum::SomeCase) . PHP_EOL . PHP_EOL);

print('Enum case name property: ' . SomeBackedEnum::SomeCase->name . PHP_EOL);
print('Enum case value: ' . SomeBackedEnum::SomeCase->value . PHP_EOL);
print('Enum case from value: ');
var_export(SomeBackedEnum::SomeCase->from('some case'));
print(PHP_EOL);
print('Enum case from right value: ');
var_export(SomeBackedEnum::SomeCase->tryFrom('some case'));
print(PHP_EOL);
print('Enum case try from wrong value: ');
var_export(SomeBackedEnum::SomeCase->tryFrom('wrong case'));
print(PHP_EOL . PHP_EOL);

enum OtherBackedEnum: int
{
    case SomeCase = 10;
    case OtherCase = 20;
    case AnotherCase = 30;
}

print("Information:\n");
var_dump(OtherBackedEnum::OtherCase);
print('Type: ' . gettype(OtherBackedEnum::OtherCase) . PHP_EOL . PHP_EOL);

print('Enum case name property: ' . OtherBackedEnum::OtherCase->name . PHP_EOL);
print('Enum case value: ' . OtherBackedEnum::OtherCase->value . PHP_EOL);
print('Enum case from value: ');
var_export(OtherBackedEnum::OtherCase->from(20));
print(PHP_EOL);
print('Enum case try right from right value: ');
var_export(OtherBackedEnum::OtherCase->tryFrom(20));
print(PHP_EOL);
print('Enum case try right wrong right value: ');
var_export(OtherBackedEnum::OtherCase->tryFrom(40));
print(PHP_EOL . PHP_EOL);
