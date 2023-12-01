<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tunai', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('referensi')->nullable(false)->unique();
            $table->enum('transaksi', ['debit', 'kredit']);
            $table->decimal('nominal', 10, 0)->default(0);
            $table->unsignedBigInteger('rekening_id')->nullable(false);
            $table->unsignedBigInteger('teller_id')->nullable(false);
            $table->foreign('rekening_id')->references('id')->on('rekening');
            $table->foreign('teller_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunai');
    }
};
