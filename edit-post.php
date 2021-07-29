<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Session\Login;
    use App\Entity\Post;
    use App\Utils\Message;
    Login::requireLogin();

    $msg = '';
    $msg_title = '';

    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $id = $_GET['id'];
    $post = Post::getPostById($_GET['id']);

    if (!$post instanceof Post) {
        header('Location: index.php');
        exit;
    }

    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if ($title && $content) {
        if (Post::postExists($title)) {
            if ($id == Post::getPostByTitle($title)->id) {
                $post->title = $title;
                $post->content = $content;
                $post->editPostById($id);
                $msg = Message::success('Notícia editada com sucesso!');
                $msg_title = Message::alert('Título mantido!');
            } else {
                $msg = Message::error('Este título já está sendo usado!');
            }
        } else {
            $post->title = $title;
            $post->content = $content;
            $post->editPostById($id);
            $msg = Message::success('Notícia editada com sucesso!');
        }
    }

    require_once "includes/header.php";
    echo strlen($msg) ? $msg : '';
    echo strlen($msg_title) ? $msg_title : '';
    require_once "includes/form-edit-post.php";
    require_once "includes/footer.php";