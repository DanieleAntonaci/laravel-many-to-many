<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        Product :: factory() -> count(100) -> make() -> each(function($product) {
            // one to many -> typology
            $typology = Typology:: inRandomOrder() -> first();
            $product -> typologies() -> associate($typology);

            $product -> save();
            
            $categories = Category:: inRandomOrder() -> limit(rand(1, 5)) -> get();
            $product -> categories() -> attach($categories);
        });
    }
}
