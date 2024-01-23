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
            $table->string('jenis_kelamin')->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('berat')->nullable(false);
            $table->string('tinggi')->nullable(false);
            $table->boolean('isMenyusui')->default(false);

            $table->foreignId('masyarakat_id')->references('id')->on('masyarakats')->onDelete('cascade');
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
