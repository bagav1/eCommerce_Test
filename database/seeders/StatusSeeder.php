<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => 'Prosessing',
        ]);

        DB::table('status')->insert([
            'name' => 'Completed',
        ]);

        DB::table('status')->insert([
            'name' => 'Cancelled',
        ]);
    }
}
