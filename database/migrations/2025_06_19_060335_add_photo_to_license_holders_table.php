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
        Schema::table('license_holders', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('hobby'); // atau sesuaikan posisinya
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('license_holders', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
