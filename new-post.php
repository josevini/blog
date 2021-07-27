<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Entity\Post;
    use App\Session\Login;
    use App\Entity\User;
    use App\Entity\Category;

    Login::requireLogin();
    if (!Category::getCategories()) {
        header('Location: new-category.php');
        exit;
    }
    $msg = '';

    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $category = $_POST['category'] ?? null;
    $usuario = $_SESSION['usuario'];

    if ($title && $category && $content) {
        $usuarios = new User();
        $usuarios->usuario = $usuario;
        $dados = $usuarios->buscaUsuario();
        $author = $dados->id;

        if (!Post::getPostByTitle($title)) {
            $newPost = new Post();
            $newPost->title = $title;
            $newPost->content = $content;
            $newPost->category = $category;
            $newPost->author = $author;
            $newPost->register();
        } else {
            $msg = 'Notícias com o mesmo título não são permitidas!';
        }
    }

    require_once "includes/header.php";
    echo strlen($msg) ? '<div class="container"><div class="alert alert-danger">'.$msg.'</div></div>' : '';
    require_once "includes/form-new-post.php";
    require_once "includes/footer.php";
