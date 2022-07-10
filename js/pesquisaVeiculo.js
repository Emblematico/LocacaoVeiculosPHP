document.querySelector("#campoPesquisaVeiculo").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("busca-veiculo.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoVeiculo").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaVeiculo").dispatchEvent(new Event("keyup"));