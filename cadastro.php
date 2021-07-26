<?php
    use App\Entity\User;
    use App\Session\Login;
    require_once __DIR__."/vendor/autoload.php";
    Login::requireLogout();
    $erro_cadastro = '';

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
            $erro_cadastro = 'Usuário em uso!';
        }
    }
    require_once "includes/header.php";
    echo strlen($erro_cadastro) ? '<div class="container"><div class="alert alert-danger">'.$erro_cadastro.'</div></div>' : '';
    require_once "includes/form-cadastro.php";
    require_once "includes/footer.php";