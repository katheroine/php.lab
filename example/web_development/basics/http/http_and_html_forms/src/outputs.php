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
        $paramItemsContent = buildParamItemsContent($data);
        $content = sprintf('<ul>%s</ul>', $paramItemsContent);
    }

    return $content;
}

function buildParamItemsContent(array $paramItems): string
{
    $paramItemsContent = '';

    foreach($paramItems as $label => $value) {
        $paramItemsContent .= sprintf('<li><b>%s</b>: %s</li>',
            $label,
            $value
        );
    }

    return $paramItemsContent;
}
