<div class="page" id="cadastro">

    <?php include "header.php"; ?>

    <h3>Cadastro de Novo NIS</h3>

    <div class="caixa-login caixa-busca">
        <label>Informe o nome</label>
        <input type="text" id="nome" />

        <div class="botao" onclick="cadastrar()">Cadastrar</div>

        <p class="texto-log">Logs:</p>
    </div>

    <script>

        async function cadastrar() {
            const nome = $("#nome").val();
            const body = { nome };

            const { data } = await axios.post("./server/nis/index.php", body);
            
            if(data.success) {
                alert("Cadastro realizado com sucesso");
                $(".texto-log").html(`
                    Cadastro realizado com sucesso!<br>
                    Nome: ${data.data.nome}<br>
                    NIS: ${data.data.nis}
                `);
                $("#nome").val("")
            } else {
                alert("Erro, verifique o log.");
                $(".texto-log").html(data.data);
            }
        }

    </script>
</div>