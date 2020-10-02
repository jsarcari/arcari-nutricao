<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataConsulta');
            $table->float('pesoPaciente');
            $table->float('alturaPaciente');
            $table->float('gorduraPaciente')->nullable();
            $table->integer('idPaciente')->unsigned();
            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
