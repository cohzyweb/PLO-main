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
        Schema::create('recruit_applications', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('shop', 255);
            $table->string('name', 255);
            $table->string('furigana', 255)->nullable();
            $table->string('email', 255);
            $table->string('phone', 50)->nullable();
            $table->string('age', 50)->nullable();
            $table->string('experience', 255)->nullable();
            $table->string('subject', 255)->nullable();
            $table->text('inquiry');
            $table->boolean('privacy_agreed')->default(false);
            $table->json('meta')->nullable();
            $table->string('status', 30)->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_applications');
    }
};
