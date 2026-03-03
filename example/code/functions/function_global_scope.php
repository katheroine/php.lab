<?php

function someFunction()
{
    function otherFunction()
    {
        print("It works!\n");
    }
}

someFunction(); // for creating the definition
otherFunction();
