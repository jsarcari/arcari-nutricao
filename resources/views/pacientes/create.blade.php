@extends('layouts.principal', ["current" => "pacientes"])

@section('titulo','Cadastro de pacientes')
@section('conteudo')
    @component('components.top',['titulo'=>'Novo paciente'])
    @endcomponent
    <script type="text/javascript" src="{{ asset('js/mascaraData.js') }}"></script>
    <form name="form" action="/pacientes" method="POST" onsubmit="return validar();">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="nomeRequired" class="imprimirAlerta"></div>
        <div class="form-group row">
        <label for="nomePaciente" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nomePaciente" name="nomePaciente" maxlength="60" placeholder="Nome do paciente">
        </div>
        </div>
        <div id="nascimentoRequired" class="imprimirAlerta"></div>
        <div class="form-group row">
        <label for="nascimentoPaciente" class="col-sm-2 col-form-label">Data de nascimento</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nascimentoPaciente" name="nascimentoPaciente" onkeyup="mascaraData(this)" placeholder="__/__/____" maxlength="10">
        </div>
        </div>
        <div id="sexoRequired" class="imprimirAlerta"></div>
        <div class="form-group row">
            <label for="sexoPaciente" class="col-sm-2 col-form-label">Sexo</label>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="M" name="sexoPaciente" class="custom-control-input" value="M"> 
            <label class="custom-control-label" for="M">Masculino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="F" name="sexoPaciente" class="custom-control-input" value="F"> 
            <label class="custom-control-label" for="F">Feminino</label>
            </div>
        </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route ('pacientes.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </div>
        </div>
    </form>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/validaFormPaciente.js') }}"></script>
@endsection