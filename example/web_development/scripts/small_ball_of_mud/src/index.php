<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Small Ball of Mud Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body
        {
            background-color: #c9e3f1ff;
        }

        header
        {
            padding: 2rem;
            background-color: #eee;
        }

        header h1,
        header h2,
        header h3
        {
            display: inline-block;
        }

        header h1,
        header h2
        {
            margin-right: 2rem;
        }

        #intro
        {
            padding: 4rem 2rem;
            background-color: #14343D;
            color: #eee;
        }

        #devinfo
        {
            padding: 2rem;
            background-color: #c9e3f1ff;
            color: #0f2430ff;
            font-size: small;
        }

        #devinfo h3
        {
            margin: 1rem 0;
        }

        #devinfo p
        {
            margin: 0.4rem 0;
        }
    </style>
</head>

<body>
    <header class="jumbotron">
        <hgroup class="container">
            <h1>PHP.lab</h1>
            <h2>WebDev Example</h2>
            <h3>Small Ball of Mud</h3>
        </hgroup>
    </header>
    <main>
        <div id="intro" class="jumbotron">
            <section id="introduction" class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is web page example in <strong>PHP <?php echo phpversion(); ?></strong> on <b>Apache</b>.</p>
            </section>
        </div>
    </main>
    <aside id="devinfo" class="jumbotron">
        <section class="container">
            <h3>Dev Info</h3>
            <?php
            define('INDICATOR_UNKNOWN', '[unknown]');
            define('INDICATOR_EMPTY', '[empty]');


            function fetchFromServer(string $paramName) {
                return ($_SERVER[$paramName] ?? INDICATOR_UNKNOWN);
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

            foreach($devInfo as $paramCodename => $paramValue) {
                $paramLabel = ucfirst(str_replace('_', ' ', $paramCodename));
                echo('<p><b>' . $paramLabel . '</b>' . ': <samp>');
                if (! is_array($paramValue)) {
                    echo($paramValue ?? INDICATOR_UNKNOWN);
                } elseif (! empty($paramValue)) {
                    foreach($paramValue as $valueCodename => $valueValue) {
                        $valueLabel = ucfirst(strtolower(str_replace('_', ' ', $valueCodename)));
                        echo('<br><b>' . $valueLabel . '</b>' . ': <samp>' . $valueValue);
                    }
                } else {
                    echo(INDICATOR_EMPTY);
                }
                echo('</samp></p>');
            }
            ?>
        </section>
    </aside>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
