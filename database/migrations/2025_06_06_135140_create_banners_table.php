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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')
                  ->constrained('shops')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // 親ショップ削除時に連鎖削除

            $table->string('title')->nullable();
            $table->boolean('is_public')->default(false);
            $table->string('thumbnail')->nullable();
            $table->string('link_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
