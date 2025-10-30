<?php

const SOME_CONSTANS = 'stable';
$someVariable = 'varying';

function someFunction()
{
}

class someClass
{
}

interface SomeInterface
{
}

trait SomeTrait
{
}

printf("Constans exists? %s\n", defined('SOME_CONSTANS'));
printf("Variable exists? %s\n", isset($someVariable));
printf("Function exists? %s\n", function_exists('someFunction'));
printf("Class exists? %s\n", class_exists('SomeClass'));
printf("Interface exists? %s\n", interface_exists('SomeInterface'));
printf("Trait exists? %s\n", trait_exists('SomeTrait'));