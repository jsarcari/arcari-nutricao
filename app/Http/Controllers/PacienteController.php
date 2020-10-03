<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('nomePaciente')->get();
        //$pacientes = Paciente::all()->orderBy('nomePaciente');
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente->nomePaciente = $request->input('nomePaciente');
        $paciente->sexoPaciente = $request->input('sexoPaciente');
        $paciente->nascimentoPaciente = $this->converteData($request->input('nascimentoPaciente'));
        $paciente->save();
        return redirect()->route('pacientes.index');
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
        $paciente = Paciente::find($id);
        if (isset($paciente)) {
            return view('pacientes.edit', compact('paciente'));
        }
        return redirect('/pacientes');
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
        $paciente = Paciente::find($id);
        if (isset($paciente)) {
            $paciente->nomePaciente = $request->input('nomePaciente');
            $paciente->sexoPaciente = $request->input('sexoPaciente');
            $paciente->nascimentoPaciente = $this->converteData($request->input('nascimentoPaciente'));
            $paciente->save();
        }
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if (isset($paciente)) {
            $paciente->delete();
        }
        return redirect()->route('pacientes.index');
    }

    public function converteData($nascimentoPaciente){

        $nascimentoPaciente = "$nascimentoPaciente[6]"."$nascimentoPaciente[7]"."$nascimentoPaciente[8]"."$nascimentoPaciente[9]"."-"."$nascimentoPaciente[3]"."$nascimentoPaciente[4]"."-"."$nascimentoPaciente[0]"."$nascimentoPaciente[1]";
    
        return $nascimentoPaciente;
    }
}
