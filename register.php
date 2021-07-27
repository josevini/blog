<?php
    require_once __DIR__."/vendor/autoload.php";
    use App\Entity\User;
    use App\Session\Login;
    Login::requireLogout();
    $msg = '';

    $nome = $_POST['nome'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;

    if ($nome && $usuario && $senha) {
        $novo_usuario = new User();
        $novo_usuario->nome = $nome;
        $novo_usuario->usuario = $usuario;
        $novo_usuario->senha = $senha;
        $dados = $novo_usuario->buscaUsuario();

        if (!$dados) {
            $novo_usuario->cadastrar();
        } else {
            $msg = 'Usuário em uso!';
        }
    }
    require_once "includes/header.php";
    echo strlen($msg) ? '<div class="container"><div class="alert alert-danger">'.$msg.'</div></div>' : '';
    require_once "includes/form-register.php";
    require_once "includes/footer.php";