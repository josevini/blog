<?php
    namespace App\Entity;
    use App\DB\DB;
    use PDO;

    class Post {
        public int $id;
        public string $title;
        public string $text;
        public int $category;
        public int $author;

        public static function getPostById($id) {
            return (new DB('noticias'))->select("id = '$id'")->fetch(PDO::FETCH_OBJ);
        }

        public static function getPostByTitle($title) {
            return (new DB('noticias'))->select("titulo = '$title'")->fetch(PDO::FETCH_OBJ);
        }

        public static function getPosts($where = '', $order = '', $limit = '') {
            return (new DB('noticias'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_OBJ);
        }

        public function register() {
            $this->id = (new DB('noticias'))->insert([
                'titulo' => addslashes($this->title),
                'texto' => addslashes($this->text),
                'categoria' => addslashes($this->category),
                'autor' => addslashes($this->author)
            ]);
        }

        public function editPostById($id) {
            (new DB('noticias'))->update([
                'titulo' => addslashes($this->title),
                'texto' => addslashes($this->text)
            ], "id = '$id'");
        }
    }