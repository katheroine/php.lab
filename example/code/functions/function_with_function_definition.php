<?php

function outerFunction()
{
    function innerFunction()
    {
        print("Inner funcion\n");
    }

    print("Outer function\n");
    innerFunction();
}

outerFunction();
