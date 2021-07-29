<?php
    require_once __DIR__."/vendor/autoload.php";
    use App\Entity\User;
    use App\Session\Login;
    Login::requireLogout();
    $msg = '';

    $name = $_POST['nome'] ?? null;
    $user = $_POST['usuario'] ?? null;
    $password = $_POST['senha'] ?? null;

    if ($name && $user && $password) {
        $obUser = new User();
        if (!User::getUserByUsername($user)) {
            $obUser->name = $name;
            $obUser->user = $user;
            $obUser->password = $password;
            $obUser->register();
        } else {
            $msg = 'Usuário em uso!';
        }
    }
    require_once "includes/header.php";
    echo strlen($msg) ? '<div class="container"><div class="alert alert-danger">'.$msg.'</div></div>' : '';
    require_once "includes/form-register.php";
    require_once "includes/footer.php";