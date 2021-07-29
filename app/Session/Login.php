<?php
    namespace App\Session;

    class Login {

        private static function init() {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        public static function isLogged() {
            self::init();
            return isset($_SESSION['user'], $_SESSION['name']);
        }

        public static function login($user) {
            self::init();
            if (!self::isLogged()) {
                $_SESSION['name'] = $user->name;
                $_SESSION['user'] = $user->user;
                header('Location: index.php');
                exit;
            }
            return true;
        }

        public static function logout() {
            if (Login::isLogged()) {
                unset($_SESSION['name']);
                unset($_SESSION['user']);
                header('Location: index.php');
                exit;
            }
        }

        public static function requireLogin() {
            if (!self::isLogged()) {
                header('Location: login.php');
                exit;
            }
        }

        public static function requireLogout() {
            if (self::isLogged()) {
                header('Location: index.php');
                exit;
            }
        }
    }