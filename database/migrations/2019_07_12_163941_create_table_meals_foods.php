<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMealsFoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('quantity',4,2);
            $table->bigInteger('meal_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();

            $table->timestamps();


            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('food_id')->references('id')->on('foods');
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
        Schema::dropIfExists('meal_food');
    }
}
