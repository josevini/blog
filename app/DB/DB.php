<?php
    namespace App\DB;
    use \PDO;
    use \PDOException;

    class DB {
        const HOST = 'db';
        const NAME = 'site_noticias';
        const USER = 'root';
        const PASS = '';
        private $connection;

        public function __construct(private $table = null){
            $this->setConnection();
        }

        private function setConnection() {
            try {
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            } catch (PDOException $e) {
                die("ERRO: {$e->getMessage()}");
            }
        }

        public function exec($query, $params = []) {
            try {
                $pdoStatement = $this->connection->prepare($query);
                $pdoStatement->execute($params);
                return $pdoStatement;
            } catch (PDOException $e) {
                die("ERRO: {$e->getMessage()}");
            }
        }

        public function insert($values): int {
            $fields = array_keys($values);
            $binds = array_pad([], count($fields), '?');
            $query = "insert into {$this->table} (".implode(', ', $fields).") values (".implode(', ', $binds).")";
            $this->exec($query, array_values($values));
            return $this->connection->lastInsertId();
        }

        public function select($where = '', $order = '', $limit = '', $fields = '*') {
            $where = strlen($where) > 0 ? "where $where" : "";
            $order = strlen($order) > 0 ? "order by $order" : "";
            $limit = strlen($limit) > 0 ? "limit $limit" : "";
            $query = "select $fields from {$this->table} $where $order $limit";
            return $this->exec($query);
        }

        public function update($values, $where) {
            $fields = array_keys($values);
            $query = "update {$this->table} set ".implode(' = ?, ', $fields)." = ? where $where";
            $this->exec($query, array_values($values));
        }

        public function delete($where) {
            $query = "delete from {$this->table} where $where";
            $this->exec($query);
        }
    }
