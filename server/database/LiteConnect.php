<?php

    class LiteConnect {

        private $pdo;
        private $path = __DIR__ . "/database.sqlite";

        public function connect() {
            try {
                $this->pdo = new PDO("sqlite:" . $this->path);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->init();

                return Response::get(true, "Conexão estabelecida com sucesso.");
            } catch(PDOException $e) {
                return Response::get(true, $e->getMessage());
            }
        }

        public function index() {
            try {
                $query = "SELECT * FROM cadastros";
                $prepare = $this->pdo->prepare($query);
                $prepare->execute();

                $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
                return Response::get(true, $result);
            } catch(PDOException $e) {
                return Response::get(true, $e->getMessage());
            }
        }

        public function findOne($nis) {
            try {
                $query = "SELECT * FROM cadastros WHERE nis = :nis";
                $prepare = $this->pdo->prepare($query);
                $prepare->bindValue(":nis", $nis);
                $prepare->execute();

                $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
                return Response::get(true, $result);
            } catch(PDOException $e) {
                return Response::get(true, $e->getMessage());
            }
        }

        public function insertOne($nome, $nis) {
            try {
                $query = "INSERT INTO cadastros(nome, nis) VALUES(:nome, :nis)";
                $prepare = $this->pdo->prepare($query);
                $prepare->bindValue(":nome", $nome);
                $prepare->bindValue(":nis", $nis);
                $prepare->execute();

                return Response::get(true, array(
                    "id_cadastro" => $this->pdo->lastInsertId(),
                    "nis" => $nis,
                    "nome" => $nome
                ));
            } catch(PDOException $e) {
                return Response::get(true, $e->getMessage());
            }
        }

        private function init() {
            $query = "CREATE TABLE IF NOT EXISTS cadastros(
                id_cadastro INTEGER PRIMARY KEY,
                nome TEXT,
                nis TEXT
            )";
            $prepare = $this->pdo->prepare($query);
            $prepare->execute();
        }

    }

?>