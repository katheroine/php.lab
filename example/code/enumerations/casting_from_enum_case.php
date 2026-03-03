<?php

enum SomeEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;
}

enum SomeBackedEnum: string
{
    case SomeCase = 'some case';
    case OtherCase = 'other case';
    case AnotherCase = 'another case';
}

$pureEnumCaseToArray = (array) SomeEnum::SomeCase;
print("Pure enum case to array: ");
var_dump($pureEnumCaseToArray);
$backedEnumCaseToArray = (array) SomeBackedEnum::OtherCase;
print("Backed enum case to array: ");
var_dump($backedEnumCaseToArray);
print(PHP_EOL);

$pureEnumCaseToObject = (object) SomeEnum::SomeCase;
print("Pure enum case to object: ");
var_dump($pureEnumCaseToObject);
$backedEnumCaseToObject = (object) SomeBackedEnum::OtherCase;
print("Backed enum case to object: ");
var_dump($backedEnumCaseToObject);
print(PHP_EOL);
