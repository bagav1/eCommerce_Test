<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_CO');
        for($i=0; $i<4; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email'=> 'user'.($i+1).'@tester.com',
                'password'=> Hash::make('123456789'),
                'country'=> $faker->country,
                'city'=> $faker->city,
                'address'=> $faker->address,
            ]);
        }
    }
}
