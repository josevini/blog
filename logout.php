<?php
    use App\Session\Login;
    require_once __DIR__."/vendor/autoload.php";
    Login::requireLogin();
    Login::logout();
    require_once "includes/header.php";
    require_once "includes/footer.php";