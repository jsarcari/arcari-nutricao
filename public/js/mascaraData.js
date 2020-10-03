function mascaraData(nascimentoPaciente){
			
	posicao = nascimentoPaciente.value.length;
	
	switch (posicao) {
		case 2:
			nascimentoPaciente.value += '/';
			break;
		case 5:
			nascimentoPaciente.value += '/';
			break;
	}
}