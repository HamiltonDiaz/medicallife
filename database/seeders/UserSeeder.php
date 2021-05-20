<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= array(
            [
                'name'=>"hamilton",
                'email'=>"diaz3220@hotmail.com",
                'telefono'=>"SIN TELEFONO",
                'ciudad'=>"SIN CIUDAD",
                'dpto'=>"SIN DEPARTAMENTO",
                'password'=>\Hash::make("1075251751"),
                'eliminado' => 0,
                
            ],
            [
                'name'=>"lisseth",
                'email'=>"liyafi1210@hotmail.com",
                'telefono'=>"SIN TELEFONO",
                'ciudad'=>"SIN CIUDAD",
                'dpto'=>"SIN DEPARTAMENTO",
                'password'=>\Hash::make("1075251751"),
                'eliminado' => 0,
            ],
        );

        foreach ($users as $user) {
            User::updateOrCreate($user);
        }
    }
}
