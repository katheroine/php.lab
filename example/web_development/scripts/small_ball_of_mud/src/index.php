<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Small Ball of Mud Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        header
        {
            padding: 2rem;
        }

        header > h1,
        header > h2,
        header > h3
        {
            display: inline-block;
        }

        header > h1,
        header > h2
        {
            margin-right: 2rem;
        }

        #intro
        {
            padding: 4rem 2rem;
            background-color: #14343D;
            color: #eee;
        }
    </style>
</head>

<body>
    <header class="container">
        <h1>PHP.lab</h1>
        <h2>WebDev Example</h2>
        <h3>Small Ball of Mud</h3>
    </header>
    <main>
        <div id="intro" class="jumbotron">
            <section id="introduction" class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is web page example in <strong>PHP <?php echo phpversion(); ?></strong> on <b>Apache</b>.</p>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
