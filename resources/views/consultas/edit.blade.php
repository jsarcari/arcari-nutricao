@extends('layouts.principal', ["current" => "consultas"])

@section('titulo','Editar consulta')
@section('conteudo')
    @component('components.top',['titulo'=>'Editar consulta'])
    @endcomponent
    <script type="text/javascript" src="{{ asset('js/mascaraData.js') }}"></script>
    <form name="form" action="/consultas/edit/{{$consulta->id}}" method="POST" onsubmit="return validar();">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
        <label for="idPaciente" class="col-sm-2 col-form-label">Paciente</label>
        <div class="col-sm-10">
            <select class="custom-select" id="idPaciente" name="idPaciente">
                <option selected>Selecione o paciente</option>
                @foreach ($pacientes as $p)
                    <option value="{{$p['id']}}">{{$p['nomePaciente']}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group row">
        <label for="dataConsulta" class="col-sm-2 col-form-label">Data da consulta</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="dataConsulta" name="dataConsulta" value="{{ $dataAtendimento=date('d/m/Y') }}" onkeyup="mascaraData(this)" placeholder="__/__/____" maxlength="10">
        </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-4">
        <label for="pesoPaciente" class="col-form-label">Peso</label>
        <input type="text" class="form-control" id="pesoPaciente" name="pesoPaciente" placeholder="kg">
        </div>
        <div class="col-sm-4">
        <label for="alturaPaciente" class="col-form-label">Altura</label>
        <input type="text" class="form-control" id="alturaPaciente" name="alturaPaciente" placeholder="m">
        </div>
        <div class="col-sm-4">
        <label for="gorduraPaciente" class="col-form-label">Gordura</label>
        <input type="text" class="form-control" id="gorduraPaciente" name="gorduraPaciente" placeholder="%">
        </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route ('consultas.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </form>
@endsection