<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFoodsTable.
 */
class CreateFoodsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foods', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name',100)->unique();
            $table->float('calories',8,2);
            $table->float('proteins',8,2);
            $table->float('carbo',8,2);
            $table->float('fiber',8,2);
            $table->float('sodium',8,2)->nullable();
            $table->float('potassium',8,2)->nullable();
            $table->float('cholesterol',8,2)->nullable();
            $table->float('portopm',8,2);
            $table->integer('status')->default(1);

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foods');
	}
}
