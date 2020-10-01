@extends('layouts.principal')

@section('titulo','Cadastro de pacientes')
@section('conteudo')
    @component('components.top',['titulo'=>'Novo paciente'])
    @endcomponent
    <form>
        <div class="form-group row">
        <label for="nomePaciente" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nomePaciente" maxlength="60" placeholder="Nome do paciente">
        </div>
        </div>
        <div class="form-group row">
        <label for="nascimentoPaciente" class="col-sm-2 col-form-label">Data de nascimento</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nascimentoPaciente" placeholder="__/__/____">
        </div>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sexoPaciente" name="sexoPaciente" class="custom-control-input">
            <label class="custom-control-label" for="sexoPaciente">Masculino</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sexoPaciente" name="sexoPaciente" class="custom-control-input">
            <label class="custom-control-label" for="sexoPaciente">Feminino</label>
        </div>
        <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route ('pacientes.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </div>
        </div>
    </form>
@endsection