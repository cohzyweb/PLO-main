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
        Schema::create('main_visuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')
                  ->nullable()
                  ->constrained('shops')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->tinyInteger('image_order')->comment('1-5: Order of image');
            $table->string('image_path')->nullable();
            $table->string('link_url')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps();
            
            // Unique constraint: one shop can only have one image per order
            $table->unique(['shop_id', 'image_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_visuals');
    }
};
