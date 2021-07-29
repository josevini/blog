<?php
namespace App\Entity;
use App\DB\DB;
use \PDO;

class User {
    public int $id;
    public string $name;
    public string $user;
    public string $password;

    public static function getUserByUsername($username) {
        return (new DB('users'))->select("user = '$username'")->fetch(PDO::FETCH_OBJ);
    }

    public static function getAllUsers() {
        return (new DB('users'))->select()->fetchAll(PDO::FETCH_OBJ);
    }

    public static function userExists($user) {
        return self::getUserByUsername($user);
    }

    public function register() {
        $this->id = (new DB('users'))->insert([
            'name' => addslashes($this->name),
            'user' => addslashes($this->user),
            'password' => password_hash(addslashes($this->password), PASSWORD_DEFAULT)
        ]);
    }

    public function editUser() {
        $usersTable = new DB('users');
        if (isset($this->password)) {
            $usersTable->update([
                'name' => addslashes($this->name),
                'password' => password_hash(addslashes($this->password), PASSWORD_DEFAULT)
            ], "user = '$this->user'");
        } else {
            $usersTable->update([
                'name' => addslashes($this->name),
            ], "user = '$this->user'");
        }
    }

    public static function deleteUser($username) {
        (new DB('users'))->delete("user = '$username'");
    }
}