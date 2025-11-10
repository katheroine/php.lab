<!DOCTYPE html>
<html lang="en-GB">
<?php
require_once('./http_info.php');
require_once('./outputs.php');
require_once('./dev_info.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTTP & HTML Forms Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <hgroup class="container py-3">
            <h1 class="d-inline-block me-4">PHP.lab</h1>
            <h2 class="d-inline-block me-4">WebDev Example</h2>
            <h3 class="d-inline-block">HTTP & HTML forms</h3>
        </hgroup>
    </header>
    <main>
        <div id="intro" class="py-5">
            <section id="introduction" class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is web page example in <strong>PHP <?php echo phpversion(); ?></strong> on <b>Apache</b>.</p>
            </section>
        </div>
        <div id="info" class="overflow-auto">
            <section id="http_info" class="container my-5">
                <h3 class="my-4">HTTP info</h3>
                <section id="http_info_method">
                    <h5 class="d-inline-block">Method</h5>:
                    <?php requestMethod(); ?>
                </section>
                <section id="http_info_request_superglobal">
                    <h5 class="my-2"><samp>$_REQUEST</samp> superglobal</h5>
                    <pre><?php requestSuperglobal(); ?></pre>
                </section>
                <section id="http_info_get_superglobal">
                    <h5 class="my-2"><samp>$_GET</samp> superglobal</h5>
                    <pre><?php getSuperglobal(); ?></pre>
                </section>
                <section id="http_info_post_superglobal">
                    <h5 class="my-2"><samp>$_POST</samp> superglobal</h5>
                    <pre><?php postSuperglobal(); ?></pre>
                </section>
            </section>
        </div>
        <div id="input" class="overflow-auto">
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
                <section id="post_input" class="my-5">
                    <h3 class="my-3">POST method input</h3>
                    <form action="./index.php" method="POST">
                        <div class="my-2">
                            <label for="post_text" class="form-label">Some text</label>
                            <input type="text" name="some_text" id="post_text" class="form-control">
                        </div>
                        <div class="my-2">
                            <label for="post_number" class="form-label">Some number</label>
                            <input type="number" name="some_number" id="post_number" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2">
                    </form>
                </section>
            </section>
        </div>
        <div id="output" class="overflow-auto">
            <section id="outputs" class="container">
                <h1 class="my-5">Output</h1>
                <section id="get_output" class="my-5">
                    <h3 class="my-3">GET method output</h3>
                    <?php requestGetParams(); ?>
                </section>
                <section id="post_output" class="my-5">
                    <h3 class="my-3">POST method output</h3>
                    <?php requestPostParams(); ?>
                </section>
            </section>
        </div>
    </main>
    <aside id="devinfo">
        <section class="container my-5">
            <h3 class="my-4">Dev Info</h3>
            <?php devInfo(); ?>
        </section>
    </aside>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
