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
        Schema::create('farm_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('latitude');
            $table->string('longitude');
            $table->foreignId('state_id');
            $table->foreignId('local_goverment_id');
            $table->foreignId('ward_id');
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_adresses');
    }
};
