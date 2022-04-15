<?php
    namespace App\Env;
    use Exception;

    class Environment {
        public static function load($dir) {
            if (file_exists($dir.'/.env')) {
                $file = file($dir.'/.env');
                foreach ($file as $variable) {
                    putenv(trim($variable));
                }
            } else {
                throw new Exception('.env not found!');
            }
        }
    }
?>