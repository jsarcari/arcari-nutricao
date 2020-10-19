@extends('layouts.principal', ["current" => "estatisticas"])

@section('titulo','Estatísticas')
@section('conteudo')
    @component('components.top',['titulo'=>'Estatísticas'])
    @endcomponent
    <p style="display: none;">Abaixo do peso: <span id="abaixo-peso">{{($array['abaixoPeso']*100)/$array['total']}}</span></p>
	<p style="display: none;">Peso normal: <span id="peso-normal">{{($array['pesoNormal']*100)/$array['total']}}</span></p>
	<p style="display: none;">Sobrepeso: <span id="sobrepeso">{{($array['sobrepeso']*100)/$array['total']}}</span></p>
	<p style="display: none;">Obesidade: <span id="obesidade">{{($array['obesidade']*100)/$array['total']}}</span></p>
	<p style="display: none;">Obesidade mórbida: <span id="morbida">{{($array['obesidadeMorbida']*100)/$array['total']}}</span></p>
    @component('components.canvas',['id'=>'situacao-total'])
    @endcomponent
    @component('components.canvas',['id'=>'grafico-peso-normal'])
    @endcomponent
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/estatisticas.js') }}"></script>
@endsection