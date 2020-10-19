<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paciente;
use App\Consulta;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('created_at','desc')->get();
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

    public function buscarConsulta($id) {
                    
        $ultimaConsulta = Consulta::where('idPaciente','=',$id)->latest()->first();
        
        return $ultimaConsulta;
    }

    public function contarSituacao($situacao) {
        $cont = 0;
        $subquery = Consulta::join('pacientes', 'consultas.idPaciente', '=', 'pacientes.id')->select(DB::raw('MAX(consultas."created_at")'))->groupBy('pacientes.nomePaciente')->get();
        $consultas = Consulta::whereIn('consultas.created_at', $subquery)->get();
        $total = $consultas->count();
        foreach ($consultas as $consulta) {
            switch($situacao) {
                case 1:
                    if($this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])<18.5)
                        $cont++;
                    break;
                case 2:
                    if($this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])>=18.5 && $this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])<25)
                        $cont++;
                    break;
                case 3:
                    if($this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])>=25 && $this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])<30)
                        $cont++;
                    break;
                case 4:
                    if($this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])>=30 && $this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])<40)
                        $cont++;
                    break;
                case 5:
                    if($this->calculaImc($consulta['pesoPaciente'],$consulta['alturaPaciente'])>=40)
                        $cont++;
                    break;
                case 6:
                    $cont = $total;
                default:
                    break;
            }
        }
        return $cont;
    }

    public function calculaEstatisticas() {
        $array = array();
        $array['abaixoPeso'] = $this->contarSituacao(1);
        $array['pesoNormal'] = $this->contarSituacao(2);
        $array['sobrepeso'] = $this->contarSituacao(3);
        $array['obesidade'] = $this->contarSituacao(4);
        $array['obesidadeMorbida'] = $this->contarSituacao(5);
        $array['total'] = $this->contarSituacao(6);
        
        return view('others.estatisticas',compact('array'));
    }

    public function calculaImc($peso, $altura) {
        if($altura!=0)
            return $peso/pow($altura,2);
        else
            return 0;
    }
}
