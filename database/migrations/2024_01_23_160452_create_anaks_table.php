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
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('nik')->nullable(false);
            $table->string('jenis_kelamin')->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('berat')->nullable(false);
            $table->string('tinggi')->nullable(false);
            $table->string('anak_ke')->nullable(false);
            $table->boolean('isBantuan')->default(false);
            $table->boolean('status')->default(false);
            $table->boolean('isMenyusui')->default(false);
            $table->boolean('isBuku')->default(false);

            $table->foreignId('masyarakat_id')->references('id')->on('masyarakats')->onDelete('cascade');
            $table->foreignId('puskesmas_id')->references('id')->on('puskesmas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
