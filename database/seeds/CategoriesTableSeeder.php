<?php

use App\Database\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Pizza',
            'created_by' => 1,
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Boats',
            'created_by' => 2,
            'shop_id' => 2
        ]);
        Category::create([
            'name' => 'Pasta',
            'created_by' => 3,
            'shop_id' => 1
        ]);
    }
}
