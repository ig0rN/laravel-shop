<?php

use App\Database\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Igor Nikolic',
            'email' => 'igor@test.com',
            'role_id' => '1',
            'password' => bcrypt('test')
        ]);
        User::create([
            'name' => 'ThinkIT Admin',
            'email' => 'admin@test.com',
            'role_id' => '1',
            'password' => bcrypt('test')
        ]);
        User::create([
            'name' => 'ThinkIT Worker',
            'email' => 'worker@test.com',
            'role_id' => '2',
            'password' => bcrypt('test')
        ]);
        User::create([
            'name' => 'Worker2',
            'email' => 'worker2@test.com',
            'role_id' => '2',
            'password' => bcrypt('test')
        ]);
        User::create([
            'name' => 'Worker3',
            'email' => 'worker3@test.com',
            'role_id' => '2',
            'password' => bcrypt('test')
        ]);
    }
}
