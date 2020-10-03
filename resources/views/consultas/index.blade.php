@extends('layouts.principal', ["current" => "consultas"])

@section('titulo','Consultas')
@section('conteudo')
    @component('components.top',['titulo'=>'Consultas'])
    <label for="filtrar-tabela">Pesquisar:</label>
    <input type="text" name="filtro" id="filtrar-tabela" placeholder="Nome do paciente">
    <a href="{{ route ('consultas.create')}}" class="btn btn-primary pull-right h2" style="margin-bottom:4px; margin-top: 2px;">Nova consulta</a>
    @endcomponent
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Paciente</th>
                <th>Data</th>
                <th>Situação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody id="tabela-consultas">
            @foreach ($consultas as $c)
                <tr class="paciente" >
                    <td class="info-id">{{ $c['id'] }}</td>
                    <td class="info-nome">{{ $c['nomePaciente'] }}</td>
                    <td class="info-data">{{ date_format(date_create($c['dataConsulta']),'d/m/Y') }}</td>
                    <td class="info-situacao">0</td>
                    <td><a href="{{ route ('consultas.edit', $c['id']) }}"><i class="fas fa-edit"></i></a>&ensp;
                        <a href="#"><i class="fas fa-trash" data-toggle="modal" data-target="#modal-{{$c['id']}}"/></i></a></td>
                    @component('components.modal',['id'=>$c['id'],'modalTitle'=>'Confirmar exclusão'])
                    <div class="modal-body">
                    <form name="formExcluir" method="POST" action="consultas/delete/{{$c['id']}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Deseja excluir a consulta do paciente <b>{{ $c['nomePaciente'] }}</b>?
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
    <script type="text/javascript" src="{{ asset('js/filtro.js') }}"></script>
@endsection