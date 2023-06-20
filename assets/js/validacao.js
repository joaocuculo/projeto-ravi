const senha = document.getElementById('senha');
const senhaConf = document.getElementById('senha-conf');
const dn = document.getElementById('DN');
const tel = document.getElementById('telefone');
const cpf = document.getElementById('CPF');

function validate(item) {
    item.setCustomValidity('');
    item.checkValidity();

    //confirmação de senha
    if (item == senhaConf) {
        if (item.value === senha.value) item.setCustomValidity('');
        else item.setCustomValidity('As senhas não são iguais! Confirme novamente.')
    }

    //confirmação de idade
    if (item == dn) {
        let hoje = new Date(); //obtem a data atual
        let dataNasc = new Date(dn.value);

        let idade = hoje.getFullYear() - dataNasc.getFullYear();
        let mes = hoje.getMonth() - dataNasc.getMonth();
        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNasc.getDate())) {
            idade--;
        }

        if (idade > 130) item.setCustomValidity('Há algo de errado com sua idade!');
        else if (idade >= 18) item.setCustomValidity('');
        else item.setCustomValidity('Você precisa de um responsável.') //AQUI É PRA ENTRAR O MODAL
    }

    if (item == cpf) {
        let numCPF = cpf.value.replace(/[^0-9]/g, "");
        if (validateCPF(numCPF)) item.setCustomValidity('');
        else item.setCustomValidity('CPF inválido!')
    }
}

//máscara do telefone
function maskTel() {
    let strtel = tel.value;
    if (strtel.length == 2) {
        tel.value += ") ";
        tel.value = "(" + tel.value;
    }
    if (strtel.length == 10) tel.value += "-";
}

function validateCPF(cpf) {

    var number, digits, sum, i, result, equal_digits;
  
    cpf = cpf.replace(/[^\d]+/g,'');
  
    equal_digits = 1;
    if (cpf.length != 11)
      return false;
  
    for (i = 0; i < cpf.length - 1; i++)
      if (cpf.charAt(i) != cpf.charAt(i + 1)){
        equal_digits = 0;
        break;
      }
  
    if(equal_digits == 1)
      return false;
  
    number = cpf.substring(0,9);
    digits = cpf.substring(9);
    sum = 0;
  
    for (i = 10; i > 1; i--)
      sum += number.charAt(10 - i) * i;
  
    result = sum % 11 < 2 ? 0 : 11 - sum % 11;
  
    if (result != digits.charAt(0))
      return false;
  
    number = cpf.substring(0,10);
    sum = 0;
  
    for (i = 11; i > 1; i--)
      sum += number.charAt(11 - i) * i;
  
    result = sum % 11 < 2 ? 0 : 11 - sum % 11;
  
    if (result != digits.charAt(1))
      return false;
  
    return true;
  }

//máscara do CPF
function maskCPF() {
    let strCPF = cpf.value;
    if (strCPF.length == 3 || strCPF.length == 7) cpf.value += ".";
    if(strCPF.length == 11) cpf.value += "-";

    validate(cpf);
}

senha.addEventListener('input', function(){validate(senha)});
senhaConf.addEventListener('input', function(){validate(senhaConf)});
dn.addEventListener('input', function(){validate(dn)});
tel.addEventListener('input', function(){maskTel()})
cpf.addEventListener('input', function(){maskCPF()})