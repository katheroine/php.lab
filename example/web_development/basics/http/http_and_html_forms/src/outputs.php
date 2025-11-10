<?php

function requestGetParams()
{
    echo(buildParamsContent($_GET));
}

function requestPostParams()
{
    echo(buildParamsContent($_POST));
}

function buildParamsContent(array $data): string
{
    $content = '';

    if (! empty($data)) {
        $content .= '<ul>';

        foreach($data as $label => $value) {
            $content .= '<li><b>' . $label . '</b>: ' . $value . '</li>';
        }

        $content .= '</ul>';
    }

    return $content;
}
