<?php
    use App\Session\Login;
    if (Login::isLogged()) {
        $file = 'includes/menu-logged.php';
    } else {
        $file = 'includes/menu.php';
    }
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title></title>
    </head>
    <body class="bg-dark text-white">
        <div class="jumbotron jumbotron-fluid p-0">
            <div class="container-lg">
                <nav class="navbar navbar-expand-lg navbar-light py-3">
                    <a href="index.php" class="navbar-brand" style="font-weight: bold">LOGO</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#op-menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="op-menu">
                        <ul class="navbar-nav ml-auto mr-3">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <?php
                                require_once "$file";
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>