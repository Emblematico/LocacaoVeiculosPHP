document.querySelector("#campoPesquisaMarca").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("busca-marca.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoMarca").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaMarca").dispatchEvent(new Event("keyup"));