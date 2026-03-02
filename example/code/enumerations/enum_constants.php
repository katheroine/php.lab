<?php

enum SomeEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;

    const int CASES_NUMBER = 3;
}

var_dump(SomeEnum::SomeCase::CASES_NUMBER);
