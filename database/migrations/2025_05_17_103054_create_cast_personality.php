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
        Schema::create('cast_personality', function (Blueprint $table) {
            $table->unsignedBigInteger('cast_id')->references('id')->on('casts');
            $table->unsignedBigInteger('personality_id')->references('id')->on('personalities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_personality');
    }
};
