<?php
    require_once __DIR__ . "/vendor/autoload.php";
    use App\Entity\Post;
    use App\Session\Login;
    use App\Entity\User;
    use App\Entity\Category;
    use App\Utils\Message;

    Login::requireLogin();
    if (!Category::getCategories()) {
        header('Location: new-category.php');
        exit;
    }
    $msg = '';

    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $category = $_POST['category'] ?? null;
    $user = $_SESSION['user'];

    if ($title && $category && $content) {
        $obUser = new User();
        $obUser->user = $user;
        $author = User::getUserByUsername($user)->id;

        if (!Post::getPostByTitle($title)) {
            $newPost = new Post();
            $newPost->title = $title;
            $newPost->content = $content;
            $newPost->category = $category;
            $newPost->author = $author;
            $newPost->register();
            $msg = Message::success('Notícia cadastrada com sucesso!');
        } else {
            $msg = Message::alert('Notícias com o mesmo título não são permitidas!');
        }
    }

    require_once "includes/header.php";
    echo strlen($msg) ? $msg : '';
    require_once "includes/form-new-post.php";
    require_once "includes/footer.php";
