<?php

    require_once __DIR__.'/vendor/autoload.php';
    use App\Session\Login;
    use App\Entity\User;
    use App\Utils\Message;
    Login::requireLogin();

    $msg = '';
    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;
    $userLogged = $_SESSION['user'];

    if ($user && $password) {
        if ($user === $userLogged) {
            if (password_verify($password, User::getUserByUsername($user)->password)) {
                User::deleteUser($user);
                Login::logout();
            } else {
                $msg = Message::error('Senha inválida!');
            }
        } else {
            $msg = Message::error('Usuário inválido!');
        }
    }

    require_once 'includes/header.php';
    echo Message::alert('A exclusão não é reversível, insira seus dados para continuar!');
    echo strlen($msg) ? $msg : '';
    require_once 'includes/form-confirm-deletion.php';
    require_once 'includes/footer.php';