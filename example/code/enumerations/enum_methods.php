<?php

enum SomeEnum: string
{
    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';

    public function someMethod()
    {
        return $this->otherMethod();
    }

    protected function otherMethod()
    {
        return $this->anotherMethod();
    }

    private function anotherMethod()
    {
        return self::SomeCase->value;
    }
}

var_dump(SomeEnum::SomeCase);

$result = SomeEnum::SomeCase->someMethod();

var_dump($result);
