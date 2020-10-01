<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConsultaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('consulta', function(Blueprint $table)
		{
			$table->foreign('idpaciente', 'consulta_idpaciente_fkey')->references('idpaciente')->on('paciente')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('consulta', function(Blueprint $table)
		{
			$table->dropForeign('consulta_idpaciente_fkey');
		});
	}

}
