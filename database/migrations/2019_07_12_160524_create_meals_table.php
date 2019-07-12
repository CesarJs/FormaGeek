<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMealsTable.
 */
class CreateMealsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meals', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->integer('day')->default(1);
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
		Schema::disableForeignKeyConstraints();
		Schema::drop('meals');
	}
}
