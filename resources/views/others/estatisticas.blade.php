@extends('layouts.principal')

@section('titulo','Estatísticas')
@section('conteudo')
    @component('components.top',['titulo'=>'Estatísticas'])
    @endcomponent
    <p style="display: none;">Abaixo do peso: <span id="abaixo-peso"><jstl:out value='${(abaixoPeso*100)/total}' /></span></p>
	<p style="display: none;">Peso normal: <span id="peso-normal"><jstl:out value='${(pesoNormal*100)/total}' /></span></p>
	<p style="display: none;">Sobrepeso: <span id="sobrepeso"><jstl:out value='${(sobrepeso*100)/total}' /></span></p>
	<p style="display: none;">Obesidade: <span id="obesidade"><jstl:out value='${(obesidade*100)/total}' /></span></p>
	<p style="display: none;">Obesidade mórbida: <span id="morbida"><jstl:out value='${(obesidadeMorbida*100)/total}' /></span></p>
	<canvas width="600" height="400"></canvas>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/estatisticas.js') }}"></script>
@endsection