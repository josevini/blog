<?php
    use App\Session\Login;
    use App\Entity\Category;
    require_once __DIR__ . "/vendor/autoload.php";
    Login::requireLogin();
    $msg_final = '';
    $categoria = $_POST['categoria'] ?? null;
    if ($categoria) {
        if (!Category::getCategoryByName($categoria)) {
            $obCategory = new Category();
            $obCategory->category = $categoria;
            $obCategory->register();
        } else {
            $msg_final = 'Esta categoria já foi cadastrada!';
        }
    }
    require_once "includes/header.php";
    echo strlen($msg_final) ? '<div class="container"><div class="alert alert-danger">'.$msg_final.'</div></div>' : '';
    require_once "includes/form-nova-categoria.php";
    require_once "includes/footer.php";
