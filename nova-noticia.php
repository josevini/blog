<?php
    use App\Entity\Post;
    use App\Session\Login;
    use App\Entity\Usuario;
    use App\Entity\Category;

    require_once __DIR__ . "/vendor/autoload.php";
    Login::requireLogin();
    if (!Category::getCategories()) {
        header('Location: nova-categoria.php');
        exit;
    }
    $msg_final = '';

    $titulo = $_POST['titulo'] ?? null;
    $texto = $_POST['texto'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $usuario = $_SESSION['usuario'];

    if ($titulo && $categoria && $texto) {
        $usuarios = new Usuario();
        $usuarios->usuario = $usuario;
        $dados = $usuarios->buscaUsuario();
        $autor = $dados->id;

        if (!Post::getPostByTitle($titulo)) {
            $newPost = new Post();
            $newPost->title = $titulo;
            $newPost->text = $texto;
            $newPost->category = $categoria;
            $newPost->author = $autor;
            $newPost->register();
        } else {
            $msg_final = 'Notícias com o mesmo título não são permitidas!';
        }
    }

    require_once "includes/header.php";
    echo strlen($msg_final) ? '<div class="container"><div class="alert alert-danger">'.$msg_final.'</div></div>' : '';
    require_once "includes/form-nova-noticia.php";
    require_once "includes/footer.php";
