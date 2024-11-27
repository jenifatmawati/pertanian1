<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->onDelete('cascade');  // Relasi ke lands
            $table->foreignId('crop_id')->constrained()->onDelete('cascade');  // Relasi ke crops
            $table->date('harvest_date');
            $table->float('quantity');  // Jumlah hasil panen
            $table->string('unit');  // Satuan hasil panen (kg, ton, dll)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};
