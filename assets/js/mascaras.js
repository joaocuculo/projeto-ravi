const cpfMask = document.getElementById('CPF');
const cepMask = document.getElementById('CEP');
const telMask = document.getElementById('telefone');

// MASCARA CPF
cpfMask.addEventListener('keypress', () => {
    let cpfLength = cpfMask.value.length;

    if (cpfLength === 3 || cpfLength === 7) {
        cpfMask.value += '.';
    } else if (cpfLength === 11) {
        cpfMask.value += '-';
    }
})

// MASCARA CEP
cepMask.addEventListener('keypress', () => {
    let cepLength = cepMask.value.length;

    if (cepLength === 5) {
        cepMask.value += '-';
    }
})

// MASCARA TELEFONE
telMask.addEventListener('keypress', () => {
    let telLength = telMask.value.length;

    if (telLength === 0) {
        telMask.value += '(';
    } else if (telLength === 3) {
        telMask.value += ') ';
    } else if (telLength === 6) {
        telMask.value += ' ';
    } else if (telLength === 11) {
        telMask.value += '-';
    }
})