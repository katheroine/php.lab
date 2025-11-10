<?php

function requestGetParams()
{
    if (! empty($_GET)) {
        echo('<ul>');

        foreach($_GET as $label => $value) {
            echo('<li><b>' . $label . '</b>: ' . $value . '</li>');
        }

        echo('</ul>');
    }
}

function requestPostParams()
{
    if (! empty($_POST)) {
        echo('<ul>');

        foreach($_POST as $label => $value) {
            echo('<li><b>' . $label . '</b>: ' . $value . '</li>');
        }

        echo('</ul>');
    }
}
