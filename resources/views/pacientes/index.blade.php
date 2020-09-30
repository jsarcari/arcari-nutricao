<h3>Pacientes</h3>
<a href="{{ route ('pacientes.create')}}">Novo paciente</a>
<ol>
    @foreach ($pacientes as $p)
        <li>
            {{ $p['nome'] }}
        </li>
    @endforeach
</ol>