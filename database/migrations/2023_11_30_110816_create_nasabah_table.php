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
        Schema::create('nasabah', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable(false);
            $table->string('ibu')->nullable(false);
            $table->date('lahir')->nullable(false);
            $table->string('email')->nullable()->unique();
            $table->string('handphone')->nullable()->unique();
            $table->unsignedBigInteger('rekening_id')->nullable(false)->unique();
            $table->foreign('rekening_id')->references('id')->on('rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};
