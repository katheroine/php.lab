<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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

function requestSuperglobal()
{
    var_dump($_REQUEST);
}
