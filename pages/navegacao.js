function navegar(page) {
    // Altera a visibilidade da tela
    $(".page").addClass("oculta")
    $(`#${page}`).removeClass("oculta");

    // Alera o highlight do item
    $(".item-menu").removeClass("ativo");
    $(`.item-menu.${page}`).addClass("ativo");

    // Abre uma flag para atualizar a página de listagem sempre que for selecionada
    if(page == "listagem")
        renderCadastros();
}