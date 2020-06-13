<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevTest14</title>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="./styles/globals.css">
        <link rel="stylesheet" type="text/css" href="./styles/pages.css">
        <script src="./pages/navegacao.js"></script>
        <script src="./pages/renderTable.js"></script>
    </head>

    <body>
    
        <div id="root">
            <?php include "./pages/cadastro.php"; ?>
            <?php include "./pages/busca.php"; ?>
            <?php include "./pages/listagem.php"; ?>
        </div>

    </body>

    <script>
        function init() {
            navegar("cadastro");
        }
        init();
    </script>

</html>