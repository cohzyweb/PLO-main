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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cast_id')
                  ->constrained('casts')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // 関連キャストが削除されたら出勤記録も削除

            $table->dateTime('start_datetime')->nullable(); // 出勤時間
            $table->dateTime('end_datetime')->nullable();  // 退勤時間
            $table->boolean('is_public')->default(true); // 公開フラグ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
