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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')
            ->constrained('shops_news')
            ->onUpdate('cascade')
            ->onDelete('cascade'); // ショップ削除時に紐づくニュースも削除

            $table->dateTime('published_at')->nullable();
            $table->string('title')->nullable();
            $table->text('contents')->nullable();
            $table->tinyInteger('published_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
