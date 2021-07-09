<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        //recupero las subcategorias
        $subcategory = SubCategory::all()->random();

        //recupero la categoria de la subcategoria seleccionada
        $category = $subcategory->category;

        //recupero las marcas de la categoria
        $brand = $category->brands->random();

        if ($subcategory->color) 
        {
            $quantity = null;
        }
        else
        {
            $quantity=15;
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'sub_category_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'satus' => 2,

        ];
    }
}
