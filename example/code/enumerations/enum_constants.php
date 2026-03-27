<?php

enum SomeEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;

    public const int CASES_NUMBER = 3;
}

var_dump(SomeEnum::SomeCase::CASES_NUMBER);
