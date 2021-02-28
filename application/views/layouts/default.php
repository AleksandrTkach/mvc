<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div class="border-bottom mb-5">
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="/tasks"> Tasks </a>
                            </li>
                            <?php if ($_SESSION['role_id'] === 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/upload"> Task upload </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item">
                                <span class="nav-link">
                                    Hi <?php echo $_SESSION['login'] ?>
                                </span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout"> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php echo $content; ?>

            </div>
        </div>

    </body>
</html>
