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
        Schema::table('users', static function (Blueprint $table) {
            $table->unsignedBigInteger('otoritas_id')->nullable();
            $table->foreign('otoritas_id')->references('id')->on('otoritas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign(['otoritas_id']);
            $table->dropColumn('otoritas_id');
        });
    }
};
