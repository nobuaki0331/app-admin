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
            'email' => 'test2@test.test',
            'password' => Hash::make('testtest'),
            'address' => '東京都ホゲホゲ',
            'tel' => '090-1234-5678',
            'sex_code' => 1,
            'permission' => 1,
        ]);

        $faker = Faker::create('ja_JP');

        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest'),
                'address' => $faker->address,
                'tel' => $faker->phoneNumber,
                'sex_code' => $faker->randomElement([0,1,2]),
                'permission' => 0,
            ]);
        }
    }
}
