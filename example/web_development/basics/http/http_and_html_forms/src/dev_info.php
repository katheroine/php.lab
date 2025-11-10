<?php

function devInfo()
{
    echo(buildDevInfoContent());
}

function buildDevInfoContent(): string
{
    $content = '';

    foreach(buildDevInfoData() as $paramCodename => $param) {
        $content .= buildParamContent($paramCodename, $param);
    }

    return $content;
}

const INDICATOR_UNKNOWN = '[unknown]';
const INDICATOR_EMPTY = '[empty]';

function buildParamContent(string $codename, array $param): string
{
    $paramLabel = formatLabelFromCodename($codename);
    $labelContent = buildLabelContent($paramLabel);
    $valueContent = buildValueContent($param['value']);
    $sourceContent = buildSourceContent($param['source']);

    return sprintf('<div class="my-2">%s: %s %s</div>',
        $labelContent,
        $valueContent,
        $sourceContent
    );
}

function formatLabelFromCodename(string $codename): string
{
    return ucfirst(str_replace('_', ' ', $codename));
}

function buildLabelContent(string $label): string
{
    return sprintf('<b>%s</b>', $label);
}

function buildValueContent(null|string|array $paramValue): string
{
    if (is_null($paramValue)) {
        $valueContent = buildScalarValueContent(INDICATOR_UNKNOWN);
    } elseif (! is_array($paramValue)) {
        $valueContent = buildScalarValueContent($paramValue);
    } elseif (empty($paramValue)) {
        $valueContent = buildScalarValueContent(INDICATOR_EMPTY);
    } else {
        $valueContent = buildArrayValueContent($paramValue);
    }

    return $valueContent;
}

function buildScalarValueContent(string $value): string
{
    return sprintf('<samp class="param_value">%s</samp>', strip_tags($value));
}

function buildArrayValueContent(array $value): string
{
    $valueItemsContent = '';

    foreach($value as $valueItem) {
        $valueItemsContent .= sprintf('<li class="my-1"><samp>%s</samp></li>', strip_tags($valueItem));
    }

    return sprintf('<ul class="my-1">%s</ul>', $valueItemsContent);
}

function buildSourceContent(string $source)
{
    return sprintf('<samp class="param_source badge">%s</samp>', $source);
}

/**
 * @return array<string, array{source: string, value: string}>
 */
function buildDevInfoData(): array
{
    $devInfo = [
        'currently_executing_script' => fetchFromServer('PHP_SELF'),
        'script_arguments' => fetchFromServer('argv'),
        'script_arguments_number' => fetchFromServer('argc'),
        'cgi_specification_version' => fetchFromServer('GATEWAY_INTERFACE'),
        'server_IP_address' => fetchFromServer('SERVER_ADDR'),
        'server_host' => fetchFromServer('SERVER_NAME'),
        'server_software' => fetchFromServer('SERVER_SOFTWARE'),
        'server_protocol' => fetchFromServer('SERVER_PROTOCOL'),
        'request_method' => fetchFromServer('REQUEST_METHOD'),
        'request_time' => fetchFromServer('REQUEST_TIME'),
        'precise_request_time' => fetchFromServer('REQUEST_TIME_FLOAT'),
        'query_string' => fetchFromServer('QUERY_STRING'),
        'document_root_directory' => fetchFromServer('DOCUMENT_ROOT'),
        'script_was_queried_through_HTTPS' => fetchFromServer('HTTPS'),
        'user_IP_address' => fetchFromServer('REMOTE_ADDR'),
        'user_host' => fetchFromServer('REMOTE_HOST'),
        'user_port' => fetchFromServer('REMOTE_PORT'),
        'authenticated_user' => fetchFromServer('REMOTE_USER'),
        'authenticated_user_when_request_is_redirected' => fetchFromServer('REDIRECT_REMOTE_USER'),
        'script_absolute_file_path' => fetchFromServer('SCRIPT_FILENAME'),
        'server_admin' => fetchFromServer('SERVER_ADMIN'),
        'server_port' => fetchFromServer('SERVER_PORT'),
        'server_version_and_virtual_host_name' => fetchFromServer('SERVER_SIGNATURE'),
        'script_filesystem_based_path' => fetchFromServer('PATH_TRANSLATED'),
        'script_path' => fetchFromServer('SCRIPT_NAME'),
        'requers_URI' => fetchFromServer('REQUEST_URI'),
        'digest_HTTP_authentication' => fetchFromServer('PHP_AUTH_DIGEST'),
        'authentication_user' => fetchFromServer('PHP_AUTH_USER'),
        'authentication_password' => fetchFromServer('PHP_AUTH_PW'),
        'authentication_type' => fetchFromServer('AUTH_TYPE'),
        'client_provided_path_information' => fetchFromServer('AUTH_TYPE'),
        'original_path_information_before_processed_by_PHP' => fetchFromServer('ORIG_PATH_INFO'),
    ];

    return $devInfo;
}

function fetchFromServer(string $paramName) {
    return [
        'source' => '$_SERVER[\'' . $paramName . '\']',
        'value' => $_SERVER[$paramName] ?? null,
    ];
};
