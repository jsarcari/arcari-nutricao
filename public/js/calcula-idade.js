var pacientes = document.querySelectorAll(".paciente");

for (var i=0; i<pacientes.length; i++) {
    var tdNascimento = pacientes[i].querySelector(".info-nascimento");
    var nascimento = tdNascimento.textContent;
        
    var idade = calculaIdade(nascimento);
    tdNascimento.textContent = idade;
}

function calculaIdade(nascimento) {
    var dataAtual = new Date();
		
	var nascimentoParts = nascimento.split('/');
					
	var diaNascimento = nascimentoParts[0];
	var mesNascimento = nascimentoParts[1];
	var anoNascimento = nascimentoParts[2];

	var dataNascimento = new Date(0 + anoNascimento, 0 + mesNascimento - 1, 0 + diaNascimento);
				
	var anoNascimento = dataNascimento.getFullYear();
	var mesNascimento = dataNascimento.getMonth();
	var diaNascimento = dataNascimento.getDate();

	var idade = dataAtual.getFullYear()-dataNascimento.getFullYear();
				
	if (dataAtual.getMonth() < dataNascimento.getMonth()) {
		idade--;
	} 
				
	if (dataAtual.getMonth() == dataNascimento.getMonth()) {
		if (dataAtual.getDate() < dataNascimento.getDate()) {
			idade--;
		}
	}

	return idade;
}