<?php
    use App\Session\Login;
    use App\Entity\Post;

    require_once __DIR__ . "/vendor/autoload.php";

    if (!Login::isLogged()) {
        header('Location: login.php');
    }

    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? null;
    $texto = $_POST['texto'] ?? null;

    if ($id && $titulo && $texto) {
        $obPost = new Post();
        $obPost->title = $titulo;
        $obPost->text = $texto;
        $obPost->editPostById($id);
        header('Location: index.php');
    }

    require_once "includes/header.php";
    require_once "includes/form-edit-noticia.php";
    require_once "includes/footer.php";