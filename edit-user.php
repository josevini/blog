<?php
    require_once __DIR__ . '/vendor/autoload.php';
    use App\Session\Login;
    use App\Entity\User;
    use App\Utils\Message;
    Login::requireLogin();

    $msg = '';
    $msg_pass = '';

    $name = $_POST['name'] ?? null;
    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;
    $newPassword = $_POST['newpassword'] ?? null;

    if ($name && $user) {
        $obUser = new User();
        $obUser->name = $name;
        $obUser->user = $user;

        if ($password && $newPassword) {
            if (password_verify($password, User::getUserByUsername($user)->password)) {
                if ($password === $newPassword) {
                    $msg_pass = Message::alert('Senha mantida!');
                } else {
                    $msg_pass = Message::success('Senha alterada!');
                    $obUser->password = $newPassword;
                }
            } else {
                $msg_pass = Message::error('Como sua senha atual está incorreta, a nova senha não será salva.');
            }
        } else {
            $msg_pass = Message::alert('Sua senha não foi alterada!');
        }

        $obUser->editUser();
        $msg = Message::alert('Para aplicar as alterações, faça logout!');
    }

    require_once 'includes/header.php';
    echo strlen($msg) ? $msg : '';
    echo strlen($msg_pass) ? $msg_pass : '';
    require_once 'includes/form-edit-user.php';
    require_once 'includes/footer.php';