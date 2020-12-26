<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'test1',
            'email' => 'test@test.test',
            'password' => Hash::make('testtest'),
            'permission' => 1,
        ]);

        $faker = Faker::create('ja_JP');

        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest'),
                'permission' => 0,
            ]);
        }
    }
}
