function validar() {
    if(document.form.nomePaciente.value=="") {
        $("#nomeRequired").text("\u26A0 O nome do paciente é obrigatório.");
        document.form.nomePaciente.focus();
        return false;
    } else {
        $("#nomeRequired").text(" ");
    }

    if(document.form.nascimentoPaciente.value=="") {
        $("#nascimentoRequired").text("\u26A0 A data de nascimento é obrigatória.");
        document.form.nascimentoPaciente.focus();
        return false;
    } else {
        $("#nascimentoRequired").text(" ");
    }

    if (document.form.sexoPaciente[0].checked == false && document.form.sexoPaciente[1].checked == false){
        $("#sexoRequired").text("\u26A0 O sexo do paciente é obrigatório.");
        document.form.sexoPaciente[0].focus();
        return false;
    } else {
        $("#sexoRequired").text(" ");
    }
}