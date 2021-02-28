<!doctype html>
<html class="h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

        <title><?php echo $title; ?></title>
    </head>

    <style>
        .message-error {
            text-align: center;
            color: #b22222;
        }
    </style>

    <body class="h-100">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row">

                <?php echo $content; ?>

            </div>
        </div>
    </body>
</html>
