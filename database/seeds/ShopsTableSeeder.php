<?php

use App\Database\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'name' => 'Shop1',
            'created_by' => 1
        ]);
        Shop::create([
            'name' => 'Shop2',
            'created_by' => 2
        ]);
    }
}
