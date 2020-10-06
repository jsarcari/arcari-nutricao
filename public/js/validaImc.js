var pacientes = document.querySelectorAll(".paciente");

for (var i=0; i<pacientes.length; i++) {
  
    var tdImc = pacientes[i].querySelector(".info-imc");
    var imc = tdImc.textContent;

    var tdSituacao = pacientes[i].querySelector(".info-situacao");
    
    if(imc!='') {
        if(imc<18.5) {
            situacao = "Abaixo do peso";
            tdSituacao.classList.add("abaixo-peso");
        } else if(imc>=18.5 && imc<25) {
            situacao = "Peso normal";
            tdSituacao.classList.add("peso-normal");
        } else if(imc>=25 && imc<30) {
            situacao = "Sobrepeso";
            tdSituacao.classList.add("sobrepeso");
        } else if(imc>=30 && imc<40) {
            situacao = "Obesidade";
            tdSituacao.classList.add("obesidade");
        } else if(imc>=40) {
            situacao = "Obesidade mórbida";
            tdSituacao.classList.add("obesidade-morbida");
        }
    } else {
        situacao = "";
    }
        
    tdSituacao.textContent = situacao;
}