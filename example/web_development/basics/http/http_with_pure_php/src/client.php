<?php
if (isset($_REQUEST['method'])) {
    $request = [
        'some_text' => $_REQUEST['some_text'],
        'some_number' => $_REQUEST['some_number'],
    ];
    $ch = curl_init('http://localhost/server.php');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_REQUEST['method']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    $response = json_decode(curl_exec($ch));
    if(curl_error($ch)) { var_dump(curl_error($ch)); }
    curl_close($ch);
}
?>
<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTTP with Pure PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <hgroup class="container py-3">
            <h1 class="d-inline-block me-4">PHP.lab</h1>
            <h2 class="d-inline-block me-4">WebDev Example</h2>
            <h3 class="d-inline-block">HTTP with pure PHP</h3>
        </hgroup>
    </header>
    <main>
        <div id="intro" class="py-5">
            <section id="introduction" class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is web page example in <strong>PHP <?php echo phpversion(); ?></strong> on <b>Apache</b>.</p>
            </section>
        </div>
        <div id="input" class="overflow-auto">
            <section id="http_request" class="container my-5">
                <h1 class="my-5">Input</h1>
                <form action="./client.php" method="POST">
                    <div class="my-2">
                        <label for="get_text" class="form-label">Some text</label>
                        <input type="text" name="some_text" id="get_text" class="form-control">
                    </div>
                    <div class="my-2">
                        <label for="get_number" class="form-label">Some number</label>
                        <input type="number" name="some_number" id="get_number" class="form-control">
                    </div>
                    <div id="request_triggers" class="my-4">
                        <input type="submit" name="method" value="GET" class="btn btn-success">
                        <input type="submit" name="method" value="POST" class="btn btn-info">
                        <input type="submit" name="method" value="PUT" class="btn btn-warning">
                        <input type="submit" name="method" value="DELETE" class="btn btn-danger">
                    </div>
                </form>
            </section>
        </div>
        <div id="output" class="overflow-auto">
            <section id="http_response" class="container my-5">
                <h3 class="my-4">HTTP responses</h3>
                <section id="response_method">
                    <h5 class="d-inline-block my-4">Method</h5>:
                    <div id="method" class="d-inline-block" style="height: 1rem;"><?php echo($response->method ?? ''); ?></div>
                </section>
                <section id="response_result">
                    <h5 class="d-inline-block my-4">Result</h5>:
                    <div id="result" class="d-inline-block" style="height: 1rem;"><?php echo($response->result ?? ''); ?></div>
                </section>
            </section>
        </div>
    </main>
</body>

</html>
