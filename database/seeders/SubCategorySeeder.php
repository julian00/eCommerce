<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //celulares y tablets
            [
                'category_id' => '1',
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],

            [
                'category_id' => '1',
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares')
            ],

            [
                'category_id' => '1',
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
                'color' => true
            ],

            //Tv, audio y video
            [
                'category_id' => '2',
                'name' => 'TV y audio',
                'slug' => Str::slug('TV y audio')
            ],

            [
                'category_id' => '2',
                'name' => 'Audio',
                'slug' => Str::slug('Audio')
            ],

            [
                'category_id' => '2',
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos')
            ],

            //Consola y videojuegos
            [
                'category_id' => '3',
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox')
            ],

            [
                'category_id' => '3',
                'name' => 'Play Statios',
                'slug' => Str::slug('Play Station')
            ],

            [
                'category_id' => '3',
                'name' => 'Videojuegos para PC',
                'slug' => Str::slug('Videojuegos para PC')
            ],

            [
                'category_id' => '3',
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo')
            ],

            //Computacion
            [
                'category_id' => '4',
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles')
            ],

            [
                'category_id' => '4',
                'name' => 'PC de escritorio',
                'slug' => Str::slug('PC de escritorio')
            ],

            [
                'category_id' => '4',
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento')
            ],

            [
                'category_id' => '4',
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios')
            ],

            //Moda
            [
                'category_id' => '5',
                'name' => 'Mujer',
                'slug' => Str::slug('Mujer'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => '5',
                'name' => 'Hombre',
                'slug' => Str::slug('Hombre'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => '5',
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes')
            ],

            [
                'category_id' => '5',
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes')
            ],
        ];

        foreach ($subcategories as $subcategory)
        {
            SubCategory::factory(1)->create($subcategory);
        }
    }
}
