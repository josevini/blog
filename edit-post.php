<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\Post;
    use App\Utils\Message;
    $msg = '';

    if (!Login::isLogged()) {
        header('Location: login.php');
    }

    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if ($id && $title && $content) {
        $obPost = new Post();
        $obPost->title = $title;
        $obPost->content = $content;
        $obPost->editPostById($id);
        header('Location: index.php');
    }

    require_once "includes/header.php";
    echo strlen($msg) ? $msg : '';
    require_once "includes/form-edit-post.php";
    require_once "includes/footer.php";