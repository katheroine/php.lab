<?php

class SomeBaseClass
{
    public function display()
    {
        print("Hello, there!\n");
    }

    public function base()
    {
        $this->display();
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function display()
    {
        print("Hello, here!\n");
    }

    public function derived()
    {
        $this->display();
    }
}

$someObject = new SomeDerivedClass();

$someObject->base();
print(PHP_EOL);

$someObject->derived();
print(PHP_EOL);
