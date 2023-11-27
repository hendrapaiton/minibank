<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtoritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('otoritas')->insert([
            "jabatan" => "Customer Service"
        ]);
        DB::table('otoritas')->insert([
            "jabatan" => "Teller"
        ]);
        DB::table('otoritas')->insert([
            "jabatan" => "Supervisor"
        ]);
    }
}
