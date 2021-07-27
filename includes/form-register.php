<div class="container">
    <div class="jumbotron">
        <form action="register.php" method="post">
            <div class="form-group">
                <label class="sr-only">Nome completo</label>
                <input type="text" class="form-control" placeholder="Nome completo" name="nome" maxlength="100" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Usuário</label>
                <input type="text" class="form-control" placeholder="Usuário" name="usuario" maxlength="20" required>
            </div>
            <div class="form-group">
                <label class="sr-only">Senha</label>
                <input type="password" class="form-control" placeholder="Senha" name="senha" maxlength="60" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar-se</button>
        </form>
    </div>
</div>