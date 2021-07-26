<?php
    use App\Entity\Post;
    use App\Entity\Category;

    $id = $_GET['id'] ?? null;
    $post = Post::getPostById($id);
    $category = Category::getCategoryById($post->categoria);
?>

<div class="container">
    <div class="jumbotron">
        <form action="edit-noticia.php" method="post">
            <div class="form-group">
                <label class="sr-only">Título</label>
                <input type="text" class="form-control" placeholder="Título" name="titulo" maxlength="20" value="<?php echo $post->titulo?>" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Categoria</label>
                <select class="custom-select" disabled>
                    <?php
                        echo "<option>$category->categoria</option>"
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only">Texto</label>
                <textarea class="form-control" rows="5" name="texto" required><?php echo $post->texto?></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo $id?>">
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</div>