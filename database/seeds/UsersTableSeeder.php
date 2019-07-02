<?php

use Illuminate\Database\Seeder;
use Treina\User;
use Treina\Models\Measure;
use Treina\Models\Food;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(User::class, 50)->create()->each(function ($user) {
        $user->measure()->save(factory(Measure::class)->make());
        $user->foods()->save(factory(Food::class)->make());
    });
    }
}
