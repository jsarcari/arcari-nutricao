<nav class="navbar center navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route ('pacientes.index') }}">Arcari Nutrição</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto text-center">
        <li @if($current=="pacientes") class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="{{ route ('pacientes.index') }}">Pacientes</a>
        </li>
        <li @if($current=="consultas") class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="{{ route ('consultas.index') }}">Consultas</a>
        </li>
        <li @if($current=="estatisticas") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="{{ route ('pacientes.estatisticas') }}">Estatísticas</a>
        </li>
      </ul>
    </div>
  </nav>