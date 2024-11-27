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
            $table->id();
            $table->string('name');  // Nama kelompok tani
            $table->string('location');  // Lokasi kelompok tani
            $table->string('contact_person');  // Nama kontak person
            $table->timestamps();  // Waktu pembuatan dan update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('farm_groups');
    }
};
