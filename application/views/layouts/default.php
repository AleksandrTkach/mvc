<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">

        <title><?php echo $title; ?></title>
    </head>
    <body>
        <header class="mb-5 border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="/"> PHP-MVC </a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/tasks' ? 'active' : '' ?>" href="/tasks"> Tasks </a>
                            </li>
                            <?php if ($_SESSION['role_id'] === 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/upload' ? 'active' : '' ?>" href="/upload"> Task upload </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <span class="nav-link disabled">
                                    Hi <?php echo $_SESSION['login'] ?>
                                </span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout"> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <div class="row">

                <?php echo $content; ?>

            </div>
        </div>

    </body>
</html>