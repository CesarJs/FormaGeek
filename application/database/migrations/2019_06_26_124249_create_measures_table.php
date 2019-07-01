<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMeasuresTable.
 */
class CreateMeasuresTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('measures', function(Blueprint $table) {
            $table->increments('id');
            $table->float('neck',8,2);
            $table->float('arm',8,2);
            $table->float('chest',8,2);
            $table->float('waist',8,2);
            $table->float('abdomen',8,2);
            $table->float('wight',8,2);
            $table->float('height',8,2);
            $table->float('forearm',8,2)->nullable();
            $table->float('hip',8,2)->nullable();
            $table->float('thigh',8,2)->nullable();
            $table->float('calf',8,2)->nullable();
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
		Schema::drop('measures');
	}
}
