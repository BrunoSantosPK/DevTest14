function renderTable(registros, idTabela) {
    let encontrados = "";
    const w1 = "10%", w2 = "60%", w3 = "30%";

    for(let i = 0; i < registros.length; i++) {
        encontrados += `
            <tr>
                <td style="width: ${w1}">${registros[i].id_cadastro}</td>
                <td style="width: ${w2}; text-align: left;">${registros[i].nome}</td>
                <td style="width: ${w3}; text-align: left;">${registros[i].nis}</td>
            </tr>`;
    }

    // Renderiza a tabela
    $(`#${idTabela}`).html(`
        <tr>
            <th style="width: ${w1}">ID</th>
            <th style="width: ${w2}; text-align: left;">Nome</th>
            <th style="width: ${w3}; text-align: left;">NIS</th>
        </tr>
        ${encontrados}
    `);
}