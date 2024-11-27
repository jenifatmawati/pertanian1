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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farm_group_id')->constrained()->onDelete('cascade');  // Relasi ke farm_groups
            $table->float('size');  // Ukuran lahan
            $table->string('location');
            $table->string('type_of_crops');
            $table->enum('status', ['active', 'inactive']);  // Status lahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
