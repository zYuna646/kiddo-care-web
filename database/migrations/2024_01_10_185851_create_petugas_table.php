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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kelamin', 100);
            $table->string('nkk', 100);
            $table->string('nik', 100);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('puskesmas_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('puskesmas_id')->on('puskesmas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
