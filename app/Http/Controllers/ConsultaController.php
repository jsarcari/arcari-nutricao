<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Paciente;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::join('pacientes', 'consultas.idPaciente', '=', 'pacientes.id')->select('consultas.*','pacientes.nomePaciente')->orderBy('created_at','desc')->get();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('consultas.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = new Consulta();
        $consulta->idPaciente = $request->get('idPaciente');
        $consulta->dataConsulta = $request->input('dataConsulta');
        $consulta->pesoPaciente = $request->input('pesoPaciente');
        $consulta->alturaPaciente = $request->input('alturaPaciente');
        $consulta->gorduraPaciente = $request->input('gorduraPaciente');
        $consulta->save();
        return redirect()->route('consultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $pacientes = Paciente::all();
        if (isset($consulta)) {
            return view('consultas.edit', compact('consulta','pacientes'));
        }
        return redirect('/consultas');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        if (isset($consulta)) {
            $consulta->idPaciente = $request->get('idPaciente');
            $consulta->dataConsulta = $request->input('dataConsulta');
            $consulta->pesoPaciente = $request->input('pesoPaciente');
            $consulta->alturaPaciente = $request->input('alturaPaciente');
            $consulta->gorduraPaciente = $request->input('gorduraPaciente');
            $consulta->save();
        }
        return redirect('/consultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        if (isset($consulta)) {
            $consulta->delete();
        }
        return redirect()->route('consultas.index');
    }

    public function converteData($dataConsulta){

        $dataConsulta = "$dataConsulta[6]"."$dataConsulta[7]"."$dataConsulta[8]"."$dataConsulta[9]"."-"."$dataConsulta[3]"."$dataConsulta[4]"."-"."$dataConsulta[0]"."$dataConsulta[1]";
    
        return $dataConsulta;
    }
}
