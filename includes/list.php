<div class="container">
    <div class="row">
        <?php
            use App\Entity\Post;
            use App\Session\Login;
            $posts = Post::getPosts(order: 'id desc');
            foreach ($posts as $post) {
                echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
                echo "<div class='card text-dark my-2' style='height: 300px'>";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>{$post->title}</h4>";
                echo "<p class='card-text'>$post->content</p>";
                if (Login::isLogged()) {
                    echo "<a class='btn btn-success mr-2' href='edit-post.php?id=$post->id'>Editar</a>";
                    echo "<a class='btn btn-danger' href='delete-post.php?id=$post->id'>Apagar</a>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>