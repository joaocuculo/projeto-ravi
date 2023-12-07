const cep = document.querySelector('#CEP');
const estado = document.querySelector('#estado');
const cidade = document.querySelector('#cidade');
const endereco = document.querySelector('#endereco');
const mensagemCep = document.querySelector('#mensagemCep');

cep.addEventListener('focusout', async () => {
    
    try {
        const apenasNum = /^[0-9]+$/;
        const cepValido = /^[0-9]{8}$/;
        
        // Remove os hífens do CEP
        const cepSemHifen = cep.value.replace("-", "");

        if (!apenasNum.test(cepSemHifen) || !cepValido.test(cepSemHifen)) {
            throw { cep_error: 'CEP inválido' };
        }

        const resposta = await fetch(`https://viacep.com.br/ws/${cepSemHifen}/json/`)
        
        if (!resposta.ok) {
            throw await resposta.json();
        }

        const respostaCep = await resposta.json();

        estado.value = respostaCep.uf;
        cidade.value = respostaCep.localidade;
        endereco.value = respostaCep.logradouro + ", " + respostaCep.bairro;

        if (respostaCep.logradouro.length === 0 || respostaCep.bairro.length === 0) {
            endereco.value = respostaCep.logradouro + "" + respostaCep.bairro;
        }        

    } catch (error) {
        if (error?.cep_error) {
            mensagemCep.textContent = error.cep_error;
            setTimeout(() => {
                mensagemCep.textContent = '';
            }, 3000);
        }
        console.error(error);
    }
});
