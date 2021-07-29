<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\Category;
    use App\Utils\Message;
    Login::requireLogin();
    $msg = '';
    $category = $_POST['category'] ?? null;
    if ($category) {
        if (!Category::getCategoryByName($category)) {
            $obCategory = new Category();
            $obCategory->category = $category;
            $obCategory->register();
            $msg = Message::success('Categoria cadastrada com sucesso!');
        } else {
            $msg = Message::alert('Esta categoria já foi cadastrada!');
        }
    }
    require_once "includes/header.php";
    echo strlen($msg) ? $msg : '';
    require_once "includes/form-new-category.php";
    require_once "includes/footer.php";
