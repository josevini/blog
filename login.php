<?php
    require_once __DIR__."/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\User;
    Login::requireLogout();
    $erro_login = '';

    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    if ($usuario && $senha) {
        $novo_usuario = new User();
        $novo_usuario->usuario = $usuario;
        $novo_usuario->senha = $senha;
        $dados = $novo_usuario->buscaUsuario();

        if ($dados) {
            if (password_verify($novo_usuario->senha, $dados->password)) {
                Login::login($novo_usuario);
            } else {
                $erro_login = "Senha incorreta!";
            }
        } else {
            $erro_login = "Usuário não encontrado!";
        }
    }
    require_once "includes/header.php";
    echo strlen($erro_login) ? '<div class="container"><div class="alert alert-danger">'.$erro_login.'</div></div>' : '';
    require_once "includes/form-login.php";
    require_once "includes/footer.php";