<?php

function requestMethod()
{
    echo($_SERVER['REQUEST_METHOD']);
}

function getSuperglobal()
{
    var_dump($_GET);
}

function postSuperglobal()
{
    var_dump($_POST);
}
