<?php
    use App\Session\Login;
    use App\Entity\Categoria;
    require_once __DIR__ . "/vendor/autoload.php";
    Login::requireLogin();
    $msg_final = '';
    $categoria = $_POST['categoria'] ?? null;
    if ($categoria) {
        $nova_categoria = new Categoria();
        $nova_categoria->categoria = $categoria;
        if (!$nova_categoria->buscaCategoria()) {
            $nova_categoria->cadastrar();
        } else {
            $msg_final = 'Esta categoria já existe!';
        }
    }
    require_once "includes/header.php";
    echo strlen($msg_final) ? '<div class="container"><div class="alert alert-danger">'.$msg_final.'</div></div>' : '';
    require_once "includes/form-nova-categoria.php";
    require_once "includes/footer.php";
