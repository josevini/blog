<?php
    use App\Entity\Category;
?>
<div class="container">
    <div class="jumbotron">
        <form method="post">
            <div class="form-group">
                <label class="sr-only">Título</label>
                <input type="text" class="form-control" placeholder="Título" name="title" maxlength="100" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Categoria</label>
                <select class="custom-select" name="category">
                    <?php
                        foreach (Category::getCategories() as $category) {
                            echo "<option value='$category->id'>".ucfirst($category->category)."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only">Texto</label>
                <textarea class="form-control" rows="5" name="content" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
        </form>
    </div>
</div>