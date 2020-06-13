<?php

    class Controller {

        /**
         * Lista os registros no banco, de acordo com o filtro informado (NIS).
         * @param $filter - Uma query para definir o tipo de busca.
         */
        public function listar($filter) {
            $banco = new LiteConnect();
            $result = $banco->connect();
    
            if($result["success"] && $filter == "all") {
                $result = $banco->index();
            } elseif($result["success"] && $filter != "all") {
                $result = $banco->findOne($filter);
            }
    
            echo json_encode($result);
        }

        /**
         * Cadastra uma nova pessoa no banco. Gera um número para o NIS internamente.
         * @param $nome - Nome da pessoa a ser cadastrada.
         */
        function cadastrar($nome) {
            // Se o nome estiver vazio, envia o erro
            if($nome == "") {
                echo json_encode(Response::get(false, "Nome em branco, por favor revise."));
                exit;
            }
    
            $banco = new LiteConnect();
            $result = $banco->connect();
    
            if($result["success"]) {
                $nis = $this->gerarNis();
    
                $result = $banco->findOne($nis);
                if($result["success"] && count($result["data"]) == 0) {
                    // O nis gerado não está cadastrado
                    $result = $banco->insertOne($nome, $nis);
    
                } elseif($result["success"] && count($result["data"]) != 0) {
    
                    // Encontra um nis válido
                    while(count($result["data"]) != 0) {
                        $nis = $this->gerarNis();
                        $result = $banco->findOne($nis);
                    }
    
                    $result = $banco->insertOne($nome, $nis);
                }
            }
        
            echo json_encode($result);
        }

        /**
         * @return - Um valor para o NIS, com 11 caracteres
         */
        private function gerarNis() {
            $possiveis = "0123456789";
            $nis = "";

            while(strlen($nis) < 11) {
                $indc = rand(0, 9);
                $nis .= $possiveis[$indc];
            }

            return $nis;
        }

    }

?>