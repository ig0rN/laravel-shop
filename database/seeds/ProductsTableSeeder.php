<?php

use App\Database\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'article_code' => '12345',
            'name' => 'Napoletana',
            'description' => 'Spicy',
            'price' => 350,
            'image_path' => 'img/products/pizza-spicy.jpg',
            'category_id' => 1,
            'created_by' => 3,
            'shop_id' => 1
        ]);
        Product::create([
            'article_code' => '5a6bs3',
            'name' => 'Capricciosa',
            'description' => 'Tasty',
            'price' => 200,
            'image_path' => 'img/products/pizza-capricciosa.jpg',
            'category_id' => 1,
            'created_by' => 1,
            'shop_id' => 1
        ]);
        Product::create([
            'article_code' => '9r82a36',
            'name' => 'Jet Ski',
            'description' => 'Very fast',
            'price' => 1150,
            'image_path' => 'img/products/jet-ski.jpg',
            'category_id' => 2,
            'created_by' => 3,
            'shop_id' => 2
        ]);
        Product::create([
            'article_code' => '28123asdxcz',
            'name' => 'Carbonara',
            'description' => 'Half kg',
            'price' => 180,
            'image_path' => 'img/products/carbonara.jpg',
            'category_id' => 3,
            'created_by' => 1,
            'shop_id' => 1
        ]);
        Product::create([
            'article_code' => 'asd987asd321',
            'name' => 'Diablo',
            'description' => 'Spicyyy',
            'price' => 260,
            'image_path' => 'img/products/pasta-spicy.jpg',
            'category_id' => 3,
            'created_by' => 2,
            'shop_id' => 1
        ]);
    }
}
