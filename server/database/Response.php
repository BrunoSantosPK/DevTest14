<?php

    class Response {

        static function get($sucesso, $data) {
            return array("success" => $sucesso, "data" => $data);
        }

    }

?>