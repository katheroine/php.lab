<?php

const INDICATOR_UNKNOWN = '[unknown]';
const INDICATOR_EMPTY = '[empty]';

/**
 * @return array<string, array{source: string, value: string}>
 */
function buildDevInfoData(): array
{
    function fetchFromServer(string $paramName) {
        return [
            'source' => '$_SERVER[\'' . $paramName . '\']',
            'value' => ($_SERVER[$paramName] ?? INDICATOR_UNKNOWN),
        ];
    };

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

function formatLabelFromCodename(string $codeName): string
{
    return ucfirst(str_replace('_', ' ', $codeName));
}

function buildLabelContent(string $label): string
{
    return sprintf('<b>%s</b>: ', $label);
}

function buildScalarValueContent(string $value): string
{
    return sprintf('<samp class="param_value me-1">%s</samp>', $value);
}

function buildArrayValueContent(array $value): string
{
    $content = '<ul class="my-1">';

    foreach($value as $valueItem) {
        $content .= sprintf('<li class="my-1"><samp>%s</samp></li>',
            $valueItem
        );
    }

    $content .= '</ul>';

    return $content;
}

function buildSourceContent(string $source)
{
    return sprintf('<samp class="param_source badge">%s</samp>', $source);
}

function buildDevInfoContent(): string
{
    $content = '';

    foreach(buildDevInfoData() as $paramCodename => $param) {
        $paramLabel = formatLabelFromCodename($paramCodename);

        $content .= '<div class="my-2">' . buildLabelContent($paramLabel);

        if (! is_array($param['value'])) {
            $content .= buildScalarValueContent($param['value'] ?? INDICATOR_UNKNOWN);
        } elseif (empty($param['value'])) {
            $content .= buildScalarValueContent(INDICATOR_EMPTY);
        } else {
            $content .= buildArrayValueContent($param['value']);
        }

        $content .= buildSourceContent($param['source']) . '</div>';
    }

    return $content;
}

function devInfo()
{
    echo(buildDevInfoContent());
}
