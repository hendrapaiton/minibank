<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekening', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor')->nullable(false)->unique();
            $table->decimal('saldo')->default(0);
            $table->unsignedBigInteger('cabang_id')->nullable(false);
            $table->foreign('cabang_id')->references('id')->on('cabang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening');
    }
};
