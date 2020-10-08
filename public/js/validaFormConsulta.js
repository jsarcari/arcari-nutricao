function validar() {
    if(document.form.idPaciente.value == "") {
        $("#pacienteRequired").text("\u26A0 O paciente é obrigatório.");
        document.form.idPaciente.focus();
        return false;
    } else {
        $("#pacienteRequired").text(" ");
    }

    if(document.form.dataConsulta.value == "") {
        $("#dataRequired").text("\u26A0 A data é obrigatória.");
        document.form.dataConsulta.focus();
        return false;
    } else {
        $("#dataRequired").text(" ");
    }

    if(document.form.pesoPaciente.value == "") {
        $("#pesoRequired").text("\u26A0 O peso é obrigatório.");
        document.form.pesoPaciente.focus();
        return false;
    } else {
        $("#pesoRequired").text(" ");
    }

    if(document.form.alturaPaciente.value == "") {
        $("#alturaRequired").text("\u26A0 A altura é obrigatória.");
        document.form.alturaPaciente.focus();
        return false;
    } else {
        $("#alturaRequired").text(" ");
    }

}