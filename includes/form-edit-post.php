<?php
    use App\Entity\Category;
    $category = Category::getCategoryById($post->category);
?>

<div class="container">
    <div class="jumbotron">
        <form method="post">
            <div class="form-group">
                <label class="sr-only">Título</label>
                <input type="text" class="form-control" placeholder="Título" name="title" maxlength="100" value="<?=$post->title?>" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Categoria</label>
                <select class="custom-select" disabled>
                    <?php
                        echo "<option>$category->category</option>"
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only">Texto</label>
                <textarea class="form-control" rows="5" name="content" required><?php echo $post->content?></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo $id?>">
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</div>