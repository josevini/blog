<?php
    namespace App\Entity;
    use App\DB\DB;
    use \PDO;

    class Usuario {
        public string $usuario;
        public string $senha;
        public string $nome;

        public function cadastrar() {
            $usuarios = new DB('usuarios');
            $usuarios->insert([
                'nome' => addslashes($this->nome),
                'usuario' => addslashes($this->usuario),
                'senha' => password_hash(addslashes($this->senha), PASSWORD_DEFAULT)
            ]);
            header('Location: login.php');
            exit;
        }

        public function buscaUsuario() {
            $usuarios = new DB('usuarios');
            $res = $usuarios->select(where: "usuario = '{$this->usuario}'");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    }