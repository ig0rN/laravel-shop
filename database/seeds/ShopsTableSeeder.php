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
            'name' => 'Napoli Pizza',
            'created_by' => 1
        ]);
        Shop::create([
            'name' => 'Water Vehicle',
            'created_by' => 2
        ]);
    }
}
