<?php

namespace Tests\Feature;

use App\Models\Cabang;
use App\Models\Rekening;
use Database\Seeders\CabangSeeder;
use Database\Seeders\OtoritasSeeder;
use Tests\TestCase;

class RekeningTest extends TestCase
{
    public function test_rekening(): void
    {
        $this->seed([CabangSeeder::class, OtoritasSeeder::class]);
        $cabang = Cabang::query()->get()->first();
        $nomor = (string) ((double) microtime() * 1000000);

        $rekening = new Rekening();
        $rekening->saldo = 100000;
        $rekening->nomor = $nomor;
        $rekening->cabang()->associate($cabang);
        $rekening->save();

        self::assertEquals($nomor, $rekening->nomor);
        self::assertEquals('Probolinggo', $rekening->cabang->nama);
    }
}
