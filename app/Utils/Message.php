<?php

    namespace App\Utils;

    class Message {

        public static function success($msg): string {
            return '<div class="container"><div class="alert alert-success">'.$msg.'</div></div>';
        }

        public static function alert($msg): string {
            return '<div class="container"><div class="alert alert-warning">'.$msg.'</div></div>';
        }

        public static function error($msg): string {
            return '<div class="container"><div class="alert alert-danger">'.$msg.'</div></div>';
        }
    }