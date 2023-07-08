const cpfMask = document.getElementById('CPF');
const cepMask = document.getElementById('CEP');

// MASCARA CPF
cpfMask.addEventListener('keypress', () =>{
    let cpfLength = cpfMask.value.length;

    if (cpfLength === 3 || cpfLength === 7) {
        cpfMask.value += '.';
    } else if (cpfLength === 11) {
        cpfMask.value += '-';
    }
})

// MASCARA CEP
cepMask.addEventListener('keypress', () =>{
    let cepLength = cepMask.value.length;

    if (cepLength === 5) {
        cepMask.value += '-';
    }
})