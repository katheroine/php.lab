<?php

enum SomeEnum: string
{
    case SomeCase = 'some case';
    case OtherCase = 'other case';
    case AnotherCase = 'another case';
}

foreach (SomeEnum::SomeCase->cases() as $case) {
    var_dump($case);
    print($case->value . PHP_EOL. PHP_EOL);
}
