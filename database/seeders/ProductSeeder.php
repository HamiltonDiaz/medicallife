<?php

namespace Database\Seeders;
use App\Models\product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos= array(
            [
                'nombre'=>"producto1L1",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod1L1",
                'img'=>"8S7fHttJpbSjenxl0vxCcgyRhBa00UivGnsGhzq7.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>1           
            ],
            [
                'nombre'=>"producto2L1",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod2L1",
                'img'=>"WvY3As1QGoZ7XahZTOwM145Cq3ZiDtxO2H2qPWra.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>1           
            ],
            [
                'nombre'=>"producto3L1",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod3L1",
                'img'=>"PJd7Q2Q4Uwpao5cULOtCwUzZabG341u1tZXY6Lle.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>1           
            ],
            [
                'nombre'=>"producto4L1",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod4L1",
                'img'=>"8S7fHttJpbSjenxl0vxCcgyRhBa00UivGnsGhzq7.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>1           
            ],
            [
                'nombre'=>"producto1L2",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod1L2",
                'img'=>"8S7fHttJpbSjenxl0vxCcgyRhBa00UivGnsGhzq7.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>2        
            ],
            [
                'nombre'=>"producto2L2",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod2L2",
                'img'=>"WvY3As1QGoZ7XahZTOwM145Cq3ZiDtxO2H2qPWra.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>2
            ],
            [
                'nombre'=>"producto3L2",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod3L2",
                'img'=>"PJd7Q2Q4Uwpao5cULOtCwUzZabG341u1tZXY6Lle.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>2
            ],
            [
                'nombre'=>"producto4L2",
                'precio'=>"",
                'referencia'=>12345,
                'descripcion'=>"descripcion prod4L2",
                'img'=>"8S7fHttJpbSjenxl0vxCcgyRhBa00UivGnsGhzq7.jpg",
                'eliminado'=>0,
                'active'=>"on",
                'line_id'=>2     
            ],
          
        );

        foreach ($productos as $producto) {
            product::updateOrCreate($producto);
        }
    }
}
