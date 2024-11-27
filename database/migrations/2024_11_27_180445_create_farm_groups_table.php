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
        Schema::create('farm_groups', function (Blueprint $table) {
            $table->id();  // ID auto increment
            $table->string('name');  // Kolom untuk nama grup
            $table->string('location');  // Kolom untuk lokasi
            $table->string('contact_person');  // Kolom untuk kontak person
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_groups');
    }
};
