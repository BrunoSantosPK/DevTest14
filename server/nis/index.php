<?php

    $req = json_decode(file_get_contents("php://input"), true);

    include_once "./controller.php";
    include_once "../database/Response.php";
    include_once "../database/LiteConnect.php";

    // Controle
    $controller = new Controller();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // Cadastra um novo nis
        $controller->cadastrar($req["nome"]);

    } elseif($_SERVER["REQUEST_METHOD"] === "GET") {
        // Lista todos os nis cadastrados
        $filter = $_GET["filter"] ?? "all";
        $controller->listar($filter);
    }

?>