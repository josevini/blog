<?php
    namespace App\Entity;
    use App\DB\DB;
    use PDO;

    class Categoria {
        public string $categoria;

        public function buscaCategoria() {
            $categorias = new DB('categorias');
            $busca = $categorias->select("categoria = '{$this->categoria}'");
            return $busca->fetch(PDO::FETCH_OBJ);
        }

        public static function buscaCategorias() {
            $categorias = new DB('categorias');
            $busca = $categorias->select(order: 'categoria');
            return $busca->fetchAll(PDO::FETCH_OBJ);
        }

        public function cadastrar() {
            $categorias = new DB('categorias');
            $categorias->insert([
                'categoria' => addslashes(strtolower($this->categoria))
            ]);
        }
    }