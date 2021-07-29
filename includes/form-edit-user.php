<?php
    use App\Entity\User;
    $username = $_SESSION['user'] ?? null;
    $user = User::getUserByUsername($username);
?>

<div class="container">
    <div class="jumbotron">
        <form method="post">
            <div class="form-group">
                <label class="sr-only">Nome completo</label>
                <input type="text" class="form-control" placeholder="Nome completo" name="name" maxlength="100" value="<?php echo $user->name?>" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Usuário</label>
                <input type="text" class="form-control" placeholder="Usuário" name="user" maxlength="20" value="<?php echo $user->user?>" readonly>
            </div>
            <div class="form-group">
                <label class="sr-only">Senha atual</label>
                <input type="password" class="form-control" placeholder="Senha atual" name="password" maxlength="60">
            </div>
            <div class="form-group">
                <label class="sr-only">Nova senha</label>
                <input type="password" class="form-control" placeholder="Nova senha" name="newpassword" maxlength="60">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>