<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Line;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineas= array(
            [
                'nombre'=>"Linea 1",                
                'descripcion'=>"descripcion Linea 1",
                'img'=>"PJd7Q2Q4Uwpao5cULOtCwUzZabG341u1tZXY6Lle.jpg",
                'eliminado'=>0,
                'active'=>"on",                
            ],
            [
                'nombre'=>"Linea 2",                
                'descripcion'=>"descripcion Linea 2",
                'img'=>"GgP8GI1acx3xHc9K2YxQSDRTAf05oywLvIxKZehD.jpg",
                'eliminado'=>0,
                'active'=>"on",                
            ],
          
        );

        foreach ($lineas as $linea) {
            Line::updateOrCreate($linea);
        }
    }
}
