<?php
    use App\Entity\Category;
?>
<div class="container">
    <div class="jumbotron">
        <form action="nova-noticia.php" method="post">
            <div class="form-group">
                <label class="sr-only">Título</label>
                <input type="text" class="form-control" placeholder="Título" name="titulo" maxlength="20" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Categoria</label>
                <select class="custom-select" name="categoria">
                    <?php
                        foreach (Category::getCategories() as $categoria) {
                            echo "<option value='$categoria->id'>".ucfirst($categoria->categoria)."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only">Texto</label>
                <textarea class="form-control" rows="5" name="texto" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
        </form>
    </div>
</div>