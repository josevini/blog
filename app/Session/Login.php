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
            return isset($_SESSION['usuario'], $_SESSION['nome']);
        }

        public static function login($usuario) {
            self::init();
            if (!self::isLogged()) {
                $dados = $usuario->buscaUsuario();
                $_SESSION['usuario'] = $dados->user;
                $_SESSION['nome'] = $dados->name;
                header('Location: index.php');
                exit;
            }
            return true;
        }

        public static function logout() {
            if (Login::isLogged()) {
                unset($_SESSION['nome']);
                unset($_SESSION['usuario']);
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