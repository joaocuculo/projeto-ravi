function mostrarSenha() {
    var inputSenha = document.getElementById('senha');
    var btnMostrarSenha = document.getElementById('btn-senha');

    if (inputSenha.type === 'password') {
        inputSenha.setAttribute('type', 'text');
        btnMostrarSenha.classList.replace('fa-eye', 'fa-eye-slash')
    } else {
        inputSenha.setAttribute('type', 'password');
        btnMostrarSenha.classList.replace('fa-eye-slash', 'fa-eye')
    }
}

function mostrarSenhaConf() {
    var inputSenhaConf = document.getElementById('senha-conf');
    var btnMostrarSenhaConf = document.getElementById('btn-senha-conf');

    if (inputSenhaConf.type === 'password') {
        inputSenhaConf.setAttribute('type', 'text');
        btnMostrarSenhaConf.classList.replace('fa-eye', 'fa-eye-slash')
    } else {
        inputSenhaConf.setAttribute('type', 'password');
        btnMostrarSenhaConf.classList.replace('fa-eye-slash', 'fa-eye')
    }
}