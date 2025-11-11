<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTTP & Ajax Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <hgroup class="container py-3">
            <h1 class="d-inline-block me-4">PHP.lab</h1>
            <h2 class="d-inline-block me-4">WebDev Example</h2>
            <h3 class="d-inline-block">HTTP & Ajax</h3>
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
                <h3 class="my-4">HTTP requests</h3>
                <div id="request_triggers" class="my-4">
                    <button class="btn btn-success" onclick="triggerGet();">GET</button>
                    <button class="btn btn-info" onclick="triggerPost();">POST</button>
                    <button class="btn btn-warning" onclick="triggerPut();">PUT</button>
                    <button class="btn btn-danger" onclick="triggerDelete();">DELETE</button>
                    <script>
                        function triggerGet() {
                            $.ajax({
                                url: 'http://localhost:8080/server.php',
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $("#board").html("GET triggered");;
                                    $("#content").html(data.method);
                                }
                            });
                            console.log("GET triggered");
                        }

                        function triggerPost() {
                            $.ajax({
                                url: "http://localhost:8080/server.php",
                                type: 'POST',
                                dataType: 'json',
                                success: function(data) {
                                    $("#board").html("POST triggered");
                                    $("#content").html(data.method);
                                }
                            });
                            console.log("POST triggered");
                        }

                        function triggerPut() {
                            $.ajax({
                                url: 'http://localhost:8080/server.php',
                                type: 'PUT',
                                dataType: 'json',
                                success: function(data) {
                                    $("#board").html("PUT triggered");
                                    $("#content").html(data.method);
                                }
                            });
                            console.log("PUT triggered");
                        }

                        function triggerDelete() {
                            $.ajax({
                                url: "http://localhost:8080/server.php",
                                type: 'DELETE',
                                dataType: 'json',
                                success: function(data) {
                                    $("#board").html("DELETE triggered");;
                                    $("#content").html(data.method);
                                }
                            });
                            console.log("DELETE triggered");
                        }
                    </script>
                </div>
                <section id="request_status">
                    <h5 class="d-inline-block my-4">Request status</h5>:
                    <div id="board" class="d-inline-block" style="height: 1rem;"></div>
                </section>
            </section>
        </div>
        <div id="output" class="overflow-auto">
            <section id="http_response" class="container my-5">
                <h3 class="my-4">HTTP responses</h3>
                <section id="response_method">
                <h5 class="d-inline-block my-4">Method</h5>:
                <div id="content" class="d-inline-block" style="height: 1rem;"></div>
            </section>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
