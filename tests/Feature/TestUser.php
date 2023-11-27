<?php

namespace Tests\Feature;

use App\Models\Cabang;
use App\Models\Otoritas;
use App\Models\User;
use Database\Seeders\CabangSeeder;
use Database\Seeders\OtoritasSeeder;
use Tests\TestCase;

class TestUser extends TestCase
{
    public function test_create_user(): void
    {
        $this->seed([OtoritasSeeder::class, CabangSeeder::class]);
        $users = new User();

        $users->name = "Hendra";
        $users->email = "mail@hendra.app";
        $users->password = "Test*123";

        $otoritas = Otoritas::all()->first();
        $cabang = Cabang::all()->first();
        $users->otoritas()->associate($otoritas);
        $users->cabang()->associate($cabang);

        $result = $users->save();

        self::assertTrue($result);
        self::assertEquals('Customer Service', $users->otoritas->jabatan);
        self::assertEquals('Probolinggo', $users->cabang->nama);
    }
}
