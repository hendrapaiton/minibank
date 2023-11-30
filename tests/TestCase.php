<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        DB::delete("delete from rekening");
        DB::delete("delete from users");
        DB::delete("delete from cabang");
        DB::delete("delete from otoritas");
    }
}
