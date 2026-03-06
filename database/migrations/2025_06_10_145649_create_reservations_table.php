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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_id')
                  ->constrained('attendances')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // attendance削除時に予約も削除

            $table->time('start_time')->nullable(); // 開始時間（時刻のみ）
            $table->time('end_time')->nullable();   // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
