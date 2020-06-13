function renderTable(registros, idTabela) {
    let encontrados = "";
    const w1 = "10%", w2 = "50%", w3 = "40%";

    for(let i = 0; i < registros.length; i++) {
        encontrados += `
            <tr>
                <td style="width: ${w1}">${registros[i].id_cadastro}</td>
                <td style="width: ${w2}">${registros[i].nome}</td>
                <td style="width: ${w3}">${registros[i].nis}</td>
            </tr>`;
    }

    // Renderiza a tabela
    $(`#${idTabela}`).html(`
        <tr>
            <th style="width: ${w1}">ID</th>
            <th style="width: ${w2}">Nome</th>
            <th style="width: ${w3}">NIS</th>
        </tr>
        ${encontrados}
    `);
}