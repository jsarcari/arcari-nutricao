<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consulta', function(Blueprint $table)
		{
			$table->integer('idconsulta', true);
			$table->integer('idpaciente');
			$table->date('dataconsulta');
			$table->decimal('pesopaciente', 10, 0);
			$table->decimal('alturapaciente', 10, 0);
			$table->decimal('gordurapaciente', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consulta');
	}

}
