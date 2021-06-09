<?php
    use App\Entity\Noticia;
    use App\Session\Login;
    use App\Entity\Usuario;
    use App\Entity\Categoria;

    require_once __DIR__ . "/vendor/autoload.php";
    Login::requireLogin();
    if (!Categoria::buscaCategorias()) {
        header('Location: nova-categoria.php');
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

        $nova_noticia = new Noticia();
        $nova_noticia->titulo = $titulo;
        $nova_noticia->texto = $texto;
        $nova_noticia->categoria = $categoria;
        $nova_noticia->autor = $autor;

        if (!$nova_noticia->buscaNoticia()) {
            $nova_noticia->cadastrar();
        } else {
            $msg_final = 'Notícias com o mesmo título não são permitidas!';
        }
    }

    require_once "includes/header.php";
    echo strlen($msg_final) ? '<div class="container"><div class="alert alert-danger">'.$msg_final.'</div></div>' : '';
    require_once "includes/form-nova-noticia.php";
    require_once "includes/footer.php";
