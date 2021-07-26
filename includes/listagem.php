<div class="container">
    <div class="row">
        <?php
            use App\Entity\Noticia;
            use App\Session\Login;
            $noticias = Noticia::buscaNoticias();
            foreach ($noticias as $noticia) {
                echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
                echo "<div class='card text-dark my-2' style='height: 300px'>";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>{$noticia->titulo}</h4>";
                echo "<p class='card-text'>$noticia->texto</p>";
                if (Login::isLogged()) {
                    echo "<a class='btn btn-success mr-2' href='edit-noticia.php?id=$noticia->id'>Editar</a>";
                    echo "<a class='btn btn-danger' href='#'>Apagar</a>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>