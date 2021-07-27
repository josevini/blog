<?php
    $user = $_SESSION['nome'];
?>

<li class="nav-item">
    <a href="new-post.php" class="nav-link">Notícia</a>
</li>
<li class="nav-item">
    <a href="new-category.php" class="nav-link">Categoria</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
        <?php echo $user?>
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Meu perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    </ul>
</li>