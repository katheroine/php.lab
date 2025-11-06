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
            background-color: #eee;
        }

        #intro
        {
            background-color: #14343D;
            color: #eee;
        }

        #input
        {
            background-color: #eee;
        }

        #output
        {
            background-color: #fefefe;
        }

        #devinfo
        {
            background-color: #c9e3f1ff;
            color: #0f2430ff;
            font-size: small;
        }

        #devinfo .param_source
        {
            background-color: #eee;
            color: #14343D;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <hgroup class="container py-3">
            <h1 class="d-inline-block me-4">PHP.lab</h1>
            <h2 class="d-inline-block me-4">WebDev Example</h2>
            <h3 class="d-inline-block">Small Ball of Mud</h3>
        </hgroup>
    </header>
    <main>
        <div id="intro" class="jumbotron py-5">
            <section id="introduction" class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is web page example in <strong>PHP <?php echo phpversion(); ?></strong> on <b>Apache</b>.</p>
            </section>
        </div>
        <div id="input" style="overflow: auto;">
            <section id="inputs" class="container">
                <h1 class="my-5">Input</h1>
                <section id="get_input" class="my-5">
                    <h3 class="my-3">GET method input</h3>
                    <form action="./index.php" method="GET">
                        <div class="my-2">
                            <label for="get_text" class="form-label">Some text</label>
                            <input type="text" name="some_text" id="get_text" class="form-control">
                        </div>
                        <div class="my-2">
                            <label for="get_number" class="form-label">Some number</label>
                            <input type="number" name="some_number" id="get_number" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2">
                    </form>
                </section>
            </section>
        </div>
        <div id="output" style="overflow: auto;">
            <section id="outputs" class="container">
                <h1 class="my-5">Output</h1>
                <section id="get_output" class="my-5">
                    <h3 class="my-3"><samp>$_GET</samp> superglobal</h3>
                    <pre><?php var_dump($_GET); ?></pre>
                    <h3 class="my-3">GET method output</h3>
                    <?php
                        if (! empty($_GET)) {
                            echo('<ul>');

                            foreach($_GET as $label => $value) {
                                echo('<li><b>' . $label . '</b>: ' . $value . '</li>');
                            }

                            echo('</ul>');
                        }
                    ?>
                </section>
            </section>
        </div>
    </main>
    <aside id="devinfo" class="jumbotron">
        <section class="container">
            <h3 class="my-4">Dev Info</h3>
            <?php
            define('INDICATOR_UNKNOWN', '[unknown]');
            define('INDICATOR_EMPTY', '[empty]');

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

            foreach($devInfo as $paramCodename => $param) {
                $paramLabel = ucfirst(str_replace('_', ' ', $paramCodename));
                echo('<p><b>' . $paramLabel . '</b>' . ': ');
                if (! is_array($param['value'])) {
                    echo('<samp class="param_value me-1">' . ($param['value'] ?? INDICATOR_UNKNOWN) . '</samp>') . '<samp class="param_source badge">' . $param['source'] . '</samp>';
                } elseif (! empty($param['value'])) {
                    echo('<ul>');
                    foreach($param['value'] as $valueCodename => $valueValue) {
                        $valueLabel = ucfirst(strtolower(str_replace('_', ' ', $valueCodename)));
                        echo('<li><b>' . $valueLabel . '</b>' . ': <samp>' . $valueValue . '</samp></li>');
                    }

                    echo('</ul><samp class="param_source badge">' . $param['source'] . '</samp>');
                } else {
                    echo(INDICATOR_EMPTY);
                }
                echo('</p>');
            }
            ?>
        </section>
    </aside>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
