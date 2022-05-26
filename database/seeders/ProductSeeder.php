<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_CO');
        for($i=0; $i<15; $i++)
        {
            DB::table('products')->insert([
                'name'=> $faker->realText(15),
                'description'=> $faker->realText(210),
                'image'=> 'link image',
                'price'=> $faker->randomFloat(2, 100000, 999999),
            ]);
        }
    }
}
