<?php
    namespace App\Entity;
    use App\DB\DB;
    use \PDO;

    class User {
        public int $id;
        public string $usuario;
        public string $senha;
        public string $nome;

        public function cadastrar() {
            $usuarios = new DB('users');
            $usuarios->insert([
                'name' => addslashes($this->nome),
                'user' => addslashes($this->usuario),
                'password' => password_hash(addslashes($this->senha), PASSWORD_DEFAULT)
            ]);
            header('Location: login.php');
            exit;
        }

        public function buscaUsuario() {
            $usuarios = new DB('users');
            $res = $usuarios->select(where: "user = '{$this->usuario}'");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    }