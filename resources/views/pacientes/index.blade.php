@extends('layouts.principal')

@section('titulo','Pacientes')
@section('conteudo')
    <section class="container">
        <div id="top" class="row">
            <div class="col-md-12">
                <h2>Pacientes</h2>
                <label for="filtrar-tabela">Pesquisar:</label>
                <input type="text" name="filtro" id="filtrar-tabela" placeholder="Nome do paciente">
                <a href="{{ route ('pacientes.create')}}" class="btn btn-primary pull-right h2" style="margin-bottom:4px; margin-top: 2px;">Novo paciente</a>
            </div>
        </div> <!-- /#top -->
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Peso(kg)</th>
                    <th>Altura(m)</th>
                    <th>Gordura Corporal(%)</th>
                    <th>IMC</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="tabela-pacientes">
                @foreach ($pacientes as $p)
                    <tr class="paciente" >
                        <td class="info-nome">{{ $p['nome'] }}</td>
                        <td class="info-peso"></td>
                        <td class="info-altura"></td>
                        <td class="info-gordura"></td>
                        <td class="info-imc"></td>
                        <td class="info-situacao">0</td>
                        <td><a href="{{ route ('pacientes.edit', $p['id']) }}"><i class="fas fa-edit"></i></a>&ensp;
                            <a href="#"><i class="fas fa-trash" data-toggle="modal" data-target="#modal-{{$p['id']}}"/></i></a></td>
                        @component('components.modal',['id'=>$p['id'],'modalTitle'=>'Confirmar exclusão'])
                        <div class="modal-body">
                        <form name="formExcluir" method="POST" action="{{ route ('pacientes.destroy', $p['id']) }}">
                            Deseja excluir o paciente <b>{{ $p['nome'] }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Excluir</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                        </form>
                        @endcomponent
                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
	<script type="text/javascript" src="{{ asset('js/filtro.js') }}"></script>
@endsection