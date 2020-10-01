<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paciente', function(Blueprint $table)
		{
			$table->integer('idpaciente', true);
			$table->char('nomepaciente', 60);
			$table->char('sexopaciente', 1);
			$table->date('nascimentopaciente');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paciente');
	}

}
