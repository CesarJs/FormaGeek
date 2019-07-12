<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDietsMeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diets_meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('diet_id')->unsigned();
            $table->bigInteger('meal_id')->unsigned();
            $table->timestamps();

            $table->foreign('diet_id')->references('id')->on('diets');
            $table->foreign('meal_id')->references('id')->on('meals');
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
        Schema::dropIfExists('diets_meals');
    }
}
