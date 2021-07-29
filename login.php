<?php
    require_once __DIR__."/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\User;
    use App\Utils\Message;

Login::requireLogout();
    $msg = '';

    $user = $_POST['usuario'] ?? null;
    $password = $_POST['senha'] ?? null;

    if ($user && $password) {
        $obUser = new User();
        if (User::getUserByUsername($user)) {
            if (password_verify($password, User::getUserByUsername($user)->password)) {
                $obUser->name = User::getUserByUsername($user)->name;
                $obUser->user = $user;
                Login::login($obUser);
            } else {
                $msg = Message::error('Senha incorreta!');
            }
        } else {
            $msg = Message::error('Usuário não encontrado!');
        }
    }
    require_once "includes/header.php";
    echo strlen($msg) ? $msg : '';
    require_once "includes/form-login.php";
    require_once "includes/footer.php";