@extends('layouts.principal', ["current" => "pacientes"])
@inject('pac', 'App\Http\Controllers\PacienteController')
@section('titulo','Pacientes')
@section('conteudo')
        @component('components.top',['titulo'=>'Pacientes'])
        <label for="filtrar-tabela">Pesquisar:</label>
        <input type="text" name="filtro" id="filtrar-tabela" placeholder="Nome do paciente">
        <a href="{{ route ('pacientes.create')}}" class="btn btn-success pull-right h2" style="margin-bottom:4px; margin-top: 2px;">Estatísticas</a>
        <a href="{{ route ('pacientes.estatisticas')}}" class="btn btn-primary pull-right h2" style="margin-bottom:4px; margin-top: 2px;">Novo paciente</a>
        @endcomponent
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Última consulta</th>
                    <th>IMC atual</th>
                    <th>Situação atual</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="tabela-pacientes">
                @foreach ($pacientes as $p)
                    @php
                    $consulta = $pac->buscarConsulta($p['id']); 
                    $imcCalculo = $pac->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente']);
                    $imc = number_format($imcCalculo,2);
                    @endphp
                    <tr class="paciente" >
                        <td class="info-nome">{{ $p['nomePaciente'] }}</td>
                        <td class="info-nascimento">{{ date_format(date_create($p['nascimentoPaciente']),'d/m/Y') }}</td>
                        <td class="info-data">@if($consulta['dataConsulta']!='') {{ date_format(date_create($consulta['dataConsulta']),'d/m/Y') }}@endif</td>
                        <td class="info-imc">@if($imc!=0) {{ $imc }} @endif</td>
                        <td class="info-situacao"></td>
                        <td><a href="{{ route ('pacientes.edit', $p['id']) }}"><i class="fas fa-edit"></i></a>&ensp;
                            <a href="#"><i class="fas fa-trash" data-toggle="modal" data-target="#modal-{{$p['id']}}"/></i></a></td>
                        @component('components.modal',['id'=>$p['id'],'modalTitle'=>'Confirmar exclusão'])
                        <div class="modal-body">
                        <form name="formExcluir" method="POST" action="pacientes/delete/{{$p['id']}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            Deseja excluir o paciente <b>{{ $p['nomePaciente'] }}</b>?
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
    <script type="text/javascript" src="{{ asset('js/calcula-idade.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/validaImc.js') }}"></script>
@endsection