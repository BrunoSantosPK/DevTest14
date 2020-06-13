<div class="page" id="listagem">
    <?php include "header.php"; ?>

    <h3>Listagem de Cadastros</h3>

    <div class="caixa-login caixa-busca">

        <label>Cadastros</label>
        <table class="tabela" id="tabelalista"></table>

    </div>

    <script>

        async function renderCadastros() {
            const { data } = await axios.get("./server/nis");
            renderTable(data.data, "tabelalista");
        }

    </script>
</div>