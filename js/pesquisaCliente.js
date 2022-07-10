document.querySelector("#campoPesquisaCliente").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("buscar-o-cliente.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoCliente").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaCliente").dispatchEvent(new Event("keyup"));