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
        Schema::table('shops', function (Blueprint $table) {
            $table->string('postcode')->after('name');
            $table->string('address1')->after('postcode');
            $table->string('address2')->nullable()->after('address1');
            $table->string('tel')->after('address2');
            $table->string('email')->after('tel');
            $table->string('map')->nullable()->after('email');
            $table->string('folder')->nullable()->after('map');
            $table->string('video_folder')->nullable()->after('folder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('postcode');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('tel');
            $table->dropColumn('email');
            $table->dropColumn('map');
            $table->dropColumn('folder');
            $table->dropColumn('video_folder');
        });
    }
};
