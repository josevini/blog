<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\Category;
    Login::requireLogin();
    $msg = '';
    $category = $_POST['category'] ?? null;
    if ($category) {
        if (!Category::getCategoryByName($category)) {
            $obCategory = new Category();
            $obCategory->category = $category;
            $obCategory->register();
        } else {
            $msg_final = 'Esta categoria já foi cadastrada!';
        }
    }
    require_once "includes/header.php";
    echo strlen($msg) ? '<div class="container"><div class="alert alert-danger">'.$msg.'</div></div>' : '';
    require_once "includes/form-new-category.php";
    require_once "includes/footer.php";
