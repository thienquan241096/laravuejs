<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Quan dz',
            'email' => 'admin@gmail.com',
            'phone' => '0999999999',
            'password' => bcrypt('123456'),
        ]);
    }
}
