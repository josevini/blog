<?php
    namespace App\Entity;
    use App\DB\DB;
    use PDO;

    class Category {
        public int $id;
        public string $category;

        public static function getCategoryById($id) {
            return (new DB('categories'))->select("id = '$id'")->fetch(PDO::FETCH_OBJ);
        }

        public static function getCategoryByName($name) {
            return (new DB('categories'))->select("category = '$name'")->fetch(PDO::FETCH_OBJ);
        }

        public static function getCategories($where = '', $order = '', $limit = '') {
            return (new DB('categories'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_OBJ);
        }

        public function register() {
            $this->id = (new DB('categories'))->insert([
                'category' => $this->category
            ]);
        }
    }