<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\Post;

    Login::requireLogin();
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    Post::deletePostById($id);
    header('Location: index.php');