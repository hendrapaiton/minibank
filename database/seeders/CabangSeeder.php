<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabang')->insert([
            "nama" => "Probolinggo"
        ]);
        DB::table('cabang')->insert([
            "nama" => "Lumajang"
        ]);
    }
}
