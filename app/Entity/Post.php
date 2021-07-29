<?php
    namespace App\Entity;
    use App\DB\DB;
    use PDO;

    class Post {
        public int $id;
        public string $title;
        public string $content;
        public int $category;
        public int $author;

        public static function getPostById($id) {
            return (new DB('posts'))->select("id = '$id'")->fetchObject(self::class);
        }

        public static function getPostByTitle($title) {
            return (new DB('posts'))->select("title = '$title'")->fetch(PDO::FETCH_OBJ);
        }

        public static function getPosts($where = '', $order = '', $limit = '') {
            return (new DB('posts'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_OBJ);
        }

        public static function postExists($title) {
            return self::getPostByTitle($title);
        }

        public function register() {
            $this->id = (new DB('posts'))->insert([
                'title' => addslashes($this->title),
                'content' => addslashes($this->content),
                'category' => addslashes($this->category),
                'author' => addslashes($this->author)
            ]);
        }

        public function editPostById($id) {
            (new DB('posts'))->update([
                'title' => addslashes($this->title),
                'content' => addslashes($this->content)
            ], "id = '$id'");
        }

        public static function deletePostById($id) {
            (new DB('posts'))->delete("id = '$id'");
        }
    }