<?php

namespace Tests\Feature;

use App\Models\Cabang;
use App\Models\Otoritas;
use App\Models\Rekening;
use App\Models\Tunai;
use App\Models\User;
use Database\Seeders\CabangSeeder;
use Database\Seeders\OtoritasSeeder;
use Tests\TestCase;

class TunaiTest extends TestCase
{
    public function test_transaksi_debit(): void
    {
        $this->seed([CabangSeeder::class, OtoritasSeeder::class]);
        $cabang = Cabang::query()->get()->first();
        $nomor = (string)((double)microtime() * 1000000);

        $rekening = new Rekening();
        $rekening->saldo = 100000;
        $rekening->nomor = $nomor;
        $rekening->cabang()->associate($cabang);
        $rekening->save();

        $users = new User();
        $users->name = "Hendra";
        $users->email = "mail@hendra.app";
        $users->password = "Test*123";

        $otoritas = Otoritas::query()->firstWhere('jabatan', '=', 'Teller');
        $cabang = Cabang::all()->first();
        $users->otoritas()->associate($otoritas);
        $users->cabang()->associate($cabang);

        $transaksi = new Tunai();
        $transaksi->referensi = 'D' . time();
        $transaksi->transaksi = 'debit';
        $transaksi->nominal = 1000000;
        $transaksi->rekening()->associate($rekening);
        $transaksi->users()->associate($users);

        self::assertEquals('Probolinggo', $rekening->cabang->nama);
        self::assertEquals(100000, $rekening->saldo);
        self::assertEquals('Teller',$transaksi->users->otoritas->jabatan);
        self::assertEquals(1000000, $transaksi->nominal);
        self::assertEquals('debit', $transaksi->transaksi);
    }

    public function test_transaksi_kredit(): void
    {
        $this->seed([CabangSeeder::class, OtoritasSeeder::class]);
        $cabang = Cabang::query()->get()->first();
        $nomor = (string)((double)microtime() * 1000000);

        $rekening = new Rekening();
        $rekening->saldo = 100000;
        $rekening->nomor = $nomor;
        $rekening->cabang()->associate($cabang);
        $rekening->save();

        $users = new User();
        $users->name = "Hendra";
        $users->email = "mail@hendra.app";
        $users->password = "Test*123";

        $otoritas = Otoritas::query()->firstWhere('jabatan', '=', 'Teller');
        $cabang = Cabang::all()->first();
        $users->otoritas()->associate($otoritas);
        $users->cabang()->associate($cabang);

        $transaksi = new Tunai();
        $transaksi->referensi = 'K' . time();
        $transaksi->transaksi = 'kredit';
        $transaksi->nominal = 1000000;
        $transaksi->rekening()->associate($rekening);
        $transaksi->users()->associate($users);

        self::assertEquals('Probolinggo', $rekening->cabang->nama);
        self::assertEquals(100000, $rekening->saldo);
        self::assertEquals('Teller',$transaksi->users->otoritas->jabatan);
        self::assertEquals(1000000, $transaksi->nominal);
        self::assertEquals('kredit', $transaksi->transaksi);    }
}
