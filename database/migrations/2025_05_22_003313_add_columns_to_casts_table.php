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
        Schema::table('casts', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('shop_id');
            $table->integer('height')->nullable()->after('age');
            $table->char('bra_size', length: 1)->nullable()->after('height');
            $table->integer('bust')->nullable()->after('bra_size');
            $table->integer('waist')->nullable()->after('bust');
            $table->integer('hip')->nullable()->after('waist');
            $table->text('appeal_point')->nullable()->after('hip');
            $table->text('manager_comment')->nullable()->after('appeal_point');
            $table->string('gallery_1')->nullable()->after('diary_email_password');
            $table->string('gallery_2')->nullable()->after('gallery_1');
            $table->string('gallery_3')->nullable()->after('gallery_2');
            $table->string('gallery_4')->nullable()->after('gallery_3');
            $table->string('gallery_5')->nullable()->after('gallery_4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('casts', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('height');
            $table->dropColumn('bra_size');
            $table->dropColumn('bust');
            $table->dropColumn('waist');
            $table->dropColumn('hip');
            $table->dropColumn('appeal_point');
            $table->dropColumn('manager_comment');
            $table->dropColumn('gallery_1');
            $table->dropColumn('gallery_2');
            $table->dropColumn('gallery_3');
            $table->dropColumn('gallery_4');
            $table->dropColumn('gallery_5');
        });
    }
};
