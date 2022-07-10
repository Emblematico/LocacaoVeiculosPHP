document.querySelector("#campoPesquisaLocacao").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("busca-locacao.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoLocacao").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaLocacao").dispatchEvent(new Event("keyup"));