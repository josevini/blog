<?php
    namespace App\Entity;
    use App\DB\DB;
    use PDO;

    class Noticia {
        public string $titulo;
        public string $texto;
        public int $categoria;
        public int $autor;

        public function buscaNoticia() {
            $noticias = new DB('noticias');
            $busca = $noticias->select("titulo = '{$this->titulo}'");
            return $busca->fetch(PDO::FETCH_OBJ);
        }

        public static function buscaNoticias() {
            $noticias = new DB('noticias');
            $busca = $noticias->select(order: 'id desc');
            return $busca->fetchAll(PDO::FETCH_OBJ);
        }

        public function cadastrar() {
            $noticias = new DB('noticias');
            $noticias->insert([
                'titulo' => addslashes($this->titulo),
                'texto' => addslashes($this->texto),
                'categoria' => addslashes($this->categoria),
                'autor' => addslashes($this->autor)
            ]);
        }
    }