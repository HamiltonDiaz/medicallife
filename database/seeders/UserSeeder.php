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
                'name'=>"admin-hamilton",
                'email'=>"diaz3220@hotmail.com",
                'telefono'=>"3212479078",
                'ciudad'=>"Neiva",
                'dpto'=>"Huila",
                'password'=>\Hash::make("1075251751"),
                'eliminado' => 0,
                
            ],
            [
                'name'=>"admin-lisseth",
                'email'=>"liyafi1210@hotmail.com",
                'telefono'=>"SIN TELEFONO",
                'ciudad'=>"Neiva",
                'dpto'=>"Huila",
                'password'=>\Hash::make("1075251751"),
                'eliminado' => 0,
            ],
            [
                'name'=>"admin-medical",
                'email'=>"administracion@medicallife.com.co",
                'telefono'=>"SIN TELEFONO",
                'ciudad'=>"Neiva",
                'dpto'=>"Huila",
                'password'=>\Hash::make("medical1234"),
                'eliminado' => 0,
            ],
        );

        foreach ($users as $user) {
            User::updateOrCreate($user);
        }
    }
}
