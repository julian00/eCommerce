<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = Size::all();

        //recupero el objeto size y la relacion con colors
        foreach ($sizes as $size) {
            $size->colors()
            //ingresa en la tabla intermedia y le paso el id de sol colores con los q quiero relacionarlo
            ->attach([  //ademas de relacionarlos le indico que la propiedad quantity lo llene con un valor
                        1 => ['quantity' => 10],
                        2 => ['quantity' => 10],
                        3 => ['quantity' => 10],
                        4 => ['quantity' => 10]
                    ]);
        }
    }
}
