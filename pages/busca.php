<div class="page" id="busca">

    <?php include "header.php"; ?>

    <h3>Busca pelo NIS</h3>

    <div class="caixa-login caixa-busca">
        <label>Informe o NIS</label>
        <input type="number" id="nis" />

        <div class="botao" onclick="buscar()">Buscar</div>

        <div class="resultado oculta" id="resultadobusca">
            <label>Resultado</label>
            <table class="tabela" id="tabelabusca"></table>
        </div>
    </div>

    <script>

        async function buscar() {
            const nis = $("#nis").val();
            const { data } = await axios.get(`./server/nis/index.php?filter=${nis}`);

            if(data.success) {
                if(data.data.length == 0) {
                    // Cadastro não encontrado
                    $("#tabelabusca").html("");
                    alert("Cidadão não encontrado.")
                } else {
                    // Renderiza a tabela com resutlados
                    renderTable(data.data, "tabelabusca");
                    $("#resultadobusca").removeClass("oculta");
                }
            } else {
                // Erro interno de conexão
                alert(data.data);
            }
        }

    </script>
</div>