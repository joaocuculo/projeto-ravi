function buscaCep() {
    let cepComHifen = document.getElementById('CEP').value;
    let cep = cepComHifen.replace("-", "");

    if (cep !== "") {
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.send();

        req.onload = function() {
            if (req.status === 200) {
                let endereco = JSON.parse(req.response);
                document.getElementById('endereco').value = endereco.street;
                document.getElementById('estado').value = endereco.state;
                document.getElementById('cidade').value = endereco.city;
                document.getElementById('endereco').value = endereco.street + ", " + endereco.neighborhood;
            } else if (req.status === 404) {
                alert("CEP inválido.")
            } else {
                alert("Erro ao fazer a requisição.")
            }
        }
    }
}

window.onload = function() {
    let txtCep = document.getElementById('CEP');
    txtCep = addEventListener("input", buscaCep);
}