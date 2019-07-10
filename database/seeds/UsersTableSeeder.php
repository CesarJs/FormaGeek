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
        $users=[];
        $users[]=['name'=>'Frango','email'=>'frango@gmail.com','email_verified_at'=>now(),'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token'=>'semnada','age'=>27,'focus'=>3,'genre'=>1];
        $users[]=['name'=>'Franga','email'=>'franga@gmail.com','email_verified_at'=>now(),'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token'=>'semnada','age'=>27,'focus'=>2,'genre'=>2];
        $measures=[];
        $measures[]=['neck'=>36,'arm'=>33,'chest'=>100,'waist'=>76,'abdomen'=>76,'weight'=>77,'height'=>188,'user_id'=>1];
        $measures[]=['neck'=>33,'arm'=>30,'chest'=>80,'waist'=>95,'abdomen'=>64,'weight'=>65.5,'height'=>168,'user_id'=>2];
     

         foreach ($users as $u) {
            User::create($u);
            
        }
        foreach ($measures as $m) {
            Measure::create($m);
            
        }
       factory(User::class, 50)->create()->each(function ($user) {
        $user->measure()->save(factory(Measure::class)->make());
        $user->foods()->save(factory(Food::class)->make());
    });
    }
}
